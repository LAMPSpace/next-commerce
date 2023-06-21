<?php

namespace App\Services;

abstract class SortFilterSearchService extends BaseService
{
    public function getSortFields(string $requestSort): array
    {
        $customSorts = $this->model->getCustomSorts();
        $sortFields = ['field' => $requestSort, 'custom' => false];
        $sortFields = in_array($requestSort, array_keys($customSorts)) ? [
            'field' => $customSorts[$requestSort],
            'custom' => true
        ] : $sortFields;
        return $sortFields;
    }

    public function getSortData(array $params): array
    {
        $defaultSortBy = $this->model->getDefaultSortBy();
        $sortFields = $this->model->getSortFields();
        $requestOrder = $params['sort'] ?? 'asc';
        $params['sort'] = $requestOrder == 'desc' ? 'desc' : 'asc';
        $requestSort = $params['sort-by'] ?? $defaultSortBy;
        $requestSort = str_replace('-', '_', $requestSort);
        $requestSort = in_array($requestSort, $sortFields) ? $requestSort : $defaultSortBy;
        $params['sort-by'] = $this->getSortFields($requestSort);
        $params['secondary-sort-by'] = $this->model->getSecondarySortBy();
        return $params;
    }

    public function getQueryField(string $field): string
    {
        $customFields = $this->model->getCustomFields();
        $stringFields = $this->model->getStringFields();
        $field = str_replace('-', '_', $field);
        $newField = $customFields[$field] ?? $field;
        return in_array($field, $stringFields) ? 'LOWER(' . $newField . ')' : $newField;
    }

    public function getFilterType(string $field, string $type): string
    {
        $stringFields = $this->model->getStringFields();
        $defaultTypes = ['equal', 'contain', 'not-contain'];
        $type = in_array($type, $defaultTypes) ? $type : 'equal';
        $type = in_array($field, $stringFields) ? $type : 'equal';
        return $type;
    }

    public function getFilterValues(string $fieldValues, string $type): array
    {
        $values = explode(' ', trim($fieldValues));
        return $type == 'equal' ? array_filter($values, function ($item) {
            return $item != 'all';
        }) : $values;
    }

    public function getFilterData(array $params): array
    {
        $filterFields = $this->model->getFilterFields();
        $filterData = array();
        foreach ($filterFields as $field) {
            if (isset($params[$field])) {
                $type = isset($params['type']) ? $this->getFilterType($field, $params['type']) : 'equal';
                $values = $this->getFilterValues($params[$field], $type);
                $field = $this->getQueryField($field);
                $filterData[$field] = ['values' => $values, 'type' => $type];
            }
        }
        $params['filter'] = $filterData;
        return $params;
    }

    public function getSearchFields(string $requestSearchBy)
    {
        $searchFields = $this->model->getSearchFields();
        $fields = array_filter(explode(' ', trim($requestSearchBy)), function ($item) use ($searchFields) {
            return in_array($item, $searchFields);
        });
        return $fields == [] ? $searchFields : $fields;
    }

    public function getSearchData(array $params): array
    {
        $requestSearch = $params['search'] ?? null;
        $requestSearchBy = $params['search-by'] ?? '';
        $searchFields = $this->getSearchFields($requestSearchBy);
        $searchData = array(
            'fields' => array(),
            'value' => strtolower($requestSearch)
        );
        foreach ($searchFields as $field) {
            $field = $this->getQueryField($field);
            array_push($searchData['fields'], $field);
        }
        $params['search'] = $searchData;
        return $params;
    }

    public function getUrlParams(array $params): array
    {
        $params = $this->getSortData($params);
        $params = $this->getFilterData($params);
        $params = $this->getSearchData($params);
        $params = $this->getPerPage($params);
        return $params;
    }
}
