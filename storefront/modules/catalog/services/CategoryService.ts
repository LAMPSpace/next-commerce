export async function getParentCategories() {
    const response = await fetch(process.env.NEXT_PUBLIC_BACKEND_URL + `/api/categories?sort-by=name&sort=asc&level=1&per-page=all`);
    return response.json();
}