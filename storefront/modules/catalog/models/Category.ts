export type CategoryModel = {
    uuid: string;
    parent_uuid: string;
    name: string;
    icon: string | null;
    description: string;
    level: number;
    all_children: CategoryModel[]
}