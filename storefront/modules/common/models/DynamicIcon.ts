export type DynamicIconModel = {
    iconName: string;
    iconColor: string | null;
    iconSize?: number;
    iconBackground: boolean;
}

export type IconList = {
    [key: string]: string;
}