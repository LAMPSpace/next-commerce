type NavItems = {
    [key: string]: {
        title: string;
        type: string;
        link: string;
    }
}

export const navItems: NavItems = {
    home: {
        title: 'Home',
        type: 'link',
        link: '/'
    },
    products: {
        title: 'Products',
        type: 'link',
        link: '/products'
    },
    about: {
        title: 'About',
        type: 'link',
        link: '/about'
    },
    categories: {
        title: 'Categories',
        type: 'nested-dropdown',
        link: '/products'
    },
    search: {
        title: 'Search',
        type: 'search',
        link: '/products'
    },
    cart: {
        title: 'Cart',
        type: 'icon-link',
        link: '/cart'
    },
    login: {
        title: 'Login',
        type: 'icon-link',
        link: '/login'
    },
    orders: {
        title: 'Orders',
        type: 'icon-link',
        link: '/orders'
    },
    stores: {
        title: 'Stores',
        type: 'icon-link',
        link: '/stores'
    }
}

export const navIconSize = 20;