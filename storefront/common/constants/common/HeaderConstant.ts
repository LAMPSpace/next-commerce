type NavBarItem = {
    justify: string;
    items: string[];
}

export const navBarItems: NavBarItem[] = [
    {
        justify: 'start',
        items: [
            'home',
            'categories',
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