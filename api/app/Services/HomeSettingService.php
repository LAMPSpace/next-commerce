<?php

namespace App\Services;

use App\Interfaces\Repository\HomeSettingRepositoryInterface;
use App\Interfaces\Service\HomeSettingServiceInterface;
use App\Models\HomeSetting;

class HomeSettingService extends SortFilterSearchService implements HomeSettingServiceInterface
{
    public function __construct(HomeSettingRepositoryInterface $repository)
    {
        $this->repository = $repository;
        $this->model = $repository->getModel();
    }

    protected function getGrid(string $lg, string $md)
    {
        return (object) [
            'lg' => $lg,
            'md' => $md
        ];
    }

    public function getHomeBanner(array $data)
    {
        $leftGridLg = isset($data['banner_left_grid_lg']) ? $data['banner_left_grid_lg'] : 3;
        $leftGridMd = isset($data['banner_left_grid_md']) ? $data['banner_left_grid_md'] : 2;
        $rightGridLg = isset($data['banner_right_grid_lg']) ? $data['banner_right_grid_lg'] : 2;

        $banner = (object) [
            'height' => $data['banner_height'],
            'content' => (object) [
                'left' =>  (object) [
                    'content' => isset($data['banner_left_content']) ? $data['banner_left_content'] : null,
                    'grid' =>  $this->getGrid($leftGridLg, $leftGridMd)
                ],
                'main' => (object) [
                    'type' => $data['banner_main_type'],
                    'pictures' => $data['banner_main_pictures'],
                    'pagination' => isset($data['banner_main_pagination']) ? $data['banner_main_pagination'] : 'title',
                    'centeredSlides' => isset($data['banner_main_centered_slides']) ? $data['banner_main_centered_slides'] : null,
                    'showTitle' => isset($data['banner_main_show_title']) ? $data['banner_main_show_title'] : null
                ],
                'right' => (object) [
                    'content' => isset($data['banner_right_content']) ? $data['banner_right_content'] : null,
                    'grid' => $this->getGrid($rightGridLg, 0)
                ],
            ]
        ];
        return json_encode($banner);
    }

    public function getHomeContent(array $data)
    {
        $content = isset($data['content']) ? $data['content'] : [];
        return json_encode($content);
    }

    public function getData($request)
    {
        $data = $request->all();
        $data['banner'] = $this->getHomeBanner($data);
        $data['content'] = $this->getHomeContent($data);
        return $data;
    }

    public function create($request): HomeSetting
    {
        $data = $this->getData($request);
        return $this->repository->create($data);
    }

    public function update($request, string | int $id): bool
    {
        $data = $this->getData($request);
        return $this->repository->update($data, $id);
    }

    public function current(): HomeSetting
    {
        return $this->repository->current();
    }
}
