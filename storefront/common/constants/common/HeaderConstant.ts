type NavBarItem = {
    justify: string;
    items: string[];
}

export const navBarItems: NavBarItem[] = [
    {
        justify: 'start',
        items: [
            'categories',
            'home',
            'products',
            'about'
        ]
    },
    {
        justify: 'center',
        items: [
            'search',
        ]
    },
    {
        justify: 'end',
        items: [
            'stores',
            'orders',
            'cart',
            'login'
        ]
    },
]