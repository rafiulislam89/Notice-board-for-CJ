<?php
// Aside menu
return [

    'items' => [
        // Dashboard
        [
            'title'     => 'Dashboard',
            'icon'      => 'fas fa-desktop', // or can be 'flaticon-home' or any flaticon-*
            'page'      => '/',
            'root'      => true,
            'roles'     => ['super-admin','admin','operation-admin','manager','counter-manager','operation-manager','accountant'],
            'new-tab'   => false,
        ],

        // Notice Board Menu with Submenu
        [
            'title'     => 'Notice Board',
            'icon'      => 'fas fa-bullhorn', // Icon for Notice Board
            'root'      => true,
            'roles'     => ['super-admin', 'admin', 'manager', 'counter-manager'],
            'new-tab'   => false,

            // Submenu items for Notice Board
            'submenu'   => [
                [
                    'title'     => 'Notice Views',
                    'icon'      => 'fas fa-eye', // Icon for Notice Views
                    'page'      => 'notices-view',  // Route or page identifier for viewing notices
                    'roles'     => ['super-admin', 'admin', 'manager', 'counter-manager'],
                    'new-tab'   => false,
                ],
                [
                    'title'     => 'Create Notice',
                    'icon'      => 'fas fa-plus-circle', // Icon for creating a notice
                    'page'      => 'notice-create',  // Route or page identifier for creating a notice
                    'roles'     => ['super-admin', 'admin', 'manager', 'counter-manager'],
                    'new-tab'   => false,
                ],
            ],
        ],
        // Admin Settings Menu
        [
            'title'     => 'Admin Settings',
            'icon'      => 'fas fa-users-cog',
            'root'      => true,
            'roles'     => ['super-admin','admin','operation-admin','manager'],
            'submenu'   => [
                [
                    'title'     => 'General Settings',
                    'icon'      => 'fas fa-tools',
                    'page'      => 'general-settings',
                    'root'      => true,
                    'roles'     => ['super-admin'],
                    'new-tab'   => false,
                ],
                [
                    'title'     => 'User Manager',
                    'icon'      => 'fas fa-user-tie',
                    'page'      => 'users',
                    'root'      => true,
                    'roles'     => ['super-admin'],
                    'new-tab'   => false,
                ],
                [
                    'title'     => 'Staff Manager',
                    'icon'      => 'fas fa-user-friends',
                    'page'      => 'staffs',
                    'root'      => true,
                    'roles'     => ['super-admin','admin','operation-admin','manager'],
                    'new-tab'   => false,
                ],
                [
                    'title'     => 'Passenger Manager',
                    'icon'      => 'fas fa-users',
                    'page'      => 'passengers',
                    'root'      => true,
                    'roles'     => ['super-admin','admin'],
                    'new-tab'   => false,
                ]
            ]
        ],
        // Bus Settings Menu
        [
            'title'     => 'Bus Settings',
            'icon'      => 'fas fa-bus',
            'root'      => true,
            'roles'     => ['super-admin','admin','operation-admin'],
            'submenu'   => [
                [
                    'title'     => 'Bus Seat Layout',
                    'icon'      => 'far fa-building fa-flip-vertical',
                    'page'      => 'seat-layouts',
                    'root'      => true,
                    'roles'     => ['super-admin','admin','operation-admin'],
                    'new-tab'   => false,
                ],
                [
                    'title'     => 'Bus Manager',
                    'icon'      => 'fas fa-bus',
                    'page'      => 'buses',
                    'root'      => true,
                    'roles'     => ['super-admin','admin','operation-admin'],
                    'new-tab'   => false,
                ]
            ]
        ],
        // Route Settings Menu
        [
            'title'     => 'Route Settings',
            'icon'      => 'fas fa-route',
            'root'      => true,
            'roles'     => ['super-admin','admin','operation-admin','accountant'],
            'submenu'   => [
                [
                    'title'     => 'Bus Stations',
                    'icon'      => 'fas fa-map-marked-alt',
                    'page'      => 'stations',
                    'root'      => true,
                    'roles'     => ['super-admin','admin','operation-admin'],
                    'new-tab'   => false,
                ],
                [
                    'title'     => 'Counter Manager',
                    'icon'      => 'fas fa-store-alt',
                    'page'      => 'counters',
                    'root'      => true,
                    'roles'     => ['super-admin','admin','operation-admin'],
                    'new-tab'   => false,
                ],
                [
                    'title'     => 'Counter Credit Manager',
                    'icon'      => 'far fa-credit-card',
                    'page'      => 'counter-credit-manage',
                    'root'      => true,
                    'roles'     => ['super-admin','operation-admin','accountant'],
                    'new-tab'   => false,
                ],
                [
                    'title'     => 'Zone Manager',
                    'icon'      => 'fas fa-th-large',
                    'page'      => 'zones',
                    'root'      => true,
                    'roles'     => ['super-admin','admin','operation-admin'],
                    'new-tab'   => false,
                ],
                [
                    'title'     => 'Route Manager',
                    'icon'      => 'fas fa-route',
                    'page'      => 'routes',
                    'root'      => true,
                    'roles'     => ['super-admin','admin','operation-admin'],
                    'new-tab'   => false,
                ]
            ]
        ],
        // Trip Settings Menu
        [
            'title'     => 'Trip Settings',
            'icon'      => 'fas fa-shipping-fast',
            'root'      => true,
            'roles'     => ['super-admin','admin','operation-admin','manager','accountant','counter-manager'],
            'submenu'   => [
                [
                    'title'     => 'Fare Manager',
                    'icon'      => 'far fa-money-bill-alt',
                    'page'      => 'fares',
                    'root'      => true,
                    'roles'     => ['super-admin','admin','manager'],
                    'new-tab'   => false,
                ],
                [
                    'title'     => 'Schedule Manager',
                    'icon'      => 'fas fa-list-ol',
                    'page'      => 'schedules',
                    'root'      => true,
                    'roles'     => ['super-admin','admin','operation-admin'],
                    'new-tab'   => false,
                ],
                [
                    'title'     => 'Trip Manager',
                    'icon'      => 'fas fa-shipping-fast',
                    'page'      => 'trips',
                    'root'      => true,
                    'roles'     => ['super-admin','admin','operation-admin','manager','accountant','counter-manager'],
                    'new-tab'   => false,
                ]
            ]
        ],
        // Offer & Promotions Menu
        [
            'title'     => 'Offer & Promotions',
            'icon'      => 'fas fa-gifts',
            'root'      => true,
            'roles'     => ['super-admin'],
            'submenu'   => [
                [
                    'title'     => 'Offer Manager',
                    'icon'      => 'fas fa-gift',
                    'page'      => '#',
                    'root'      => true,
                    'roles'     => ['super-admin'],
                    'new-tab'   => false,
                ],
                [
                    'title'     => 'Promo Code Manager',
                    'icon'      => 'fas fa-tag',
                    'page'      => '#',
                    'root'      => true,
                    'roles'     => ['super-admin'],
                    'new-tab'   => false,
                ]
            ]
        ],
        // Income & Expense Menu
        [
            'title'     => 'Income & Expense',
            'icon'      => 'fas fa-money-check-alt',
            'root'      => true,
            'roles'     => ['super-admin','accountant'],
            'submenu'   => [
                [
                    'title'     => 'Income Purposes',
                    'icon'      => 'fas fa-indent',
                    'page'      => 'income-purposes',
                    'root'      => true,
                    'roles'     => ['super-admin','accountant'],
                    'new-tab'   => false,
                ],
                [
                    'title'     => 'Expense Purposes',
                    'icon'      => 'fas fa-outdent',
                    'page'      => 'expense-purposes',
                    'root'      => true,
                    'roles'     => ['super-admin','accountant'],
                    'new-tab'   => false,
                ],
                [
                    'title'     => 'Bus Income & Expense',
                    'icon'      => 'fas fa-bus-alt',
                    'page'      => 'bus-income-expense',
                    'root'      => true,
                    'roles'     => ['super-admin','accountant'],
                    'new-tab'   => false,
                ],
                [
                    'title'     => 'Company Income & Expense',
                    'icon'      => 'fas fa-landmark',
                    'page'      => 'company-income-expense',
                    'root'      => true,
                    'roles'     => ['super-admin','accountant'],
                    'new-tab'   => false,
                ]
            ]
        ],
        // Counter Panel Menu
        [
            'title'     => 'Counter Panel',
            'icon'      => 'fas fa-store-alt',
            'root'      => true,
            'roles'     => ['super-admin','admin','operation-admin','manager','counter-manager','operation-manager','counter-master','operation-master','accountant','supervisor'],
            'submenu'   => [
                [
                    'title'     => 'Ticket Issue',
                    'icon'      => 'fas fa-ticket-alt',
                    'page'      => 'ticket-issue',
                    'root'      => true,
                    'roles'     => ['super-admin','admin','operation-admin','manager','counter-manager','operation-manager','counter-master','operation-master','accountant','supervisor'],
                    'new-tab'   => false,
                ],
                [
                    'title'     => 'Sales Report',
                    'icon'      => 'fas fa-file-alt',
                    'page'      => 'counter-sales-report',
                    'root'      => true,
                    'roles'     => ['manager','counter-manager','operation-manager','counter-master','operation-master','supervisor'],
                    'new-tab'   => false,
                ],
                [
                    'title'     => 'Booking Report',
                    'icon'      => 'far fa-file-alt',
                    'page'      => 'counter-booking-report',
                    'root'      => true,
                    'roles'     => ['manager','counter-manager','operation-manager','counter-master','operation-master','supervisor'],
                    'new-tab'   => false,
                ],
                [
                    'title'     => 'Cancel Report',
                    'icon'      => 'far fa-file-excel',
                    'page'      => 'counter-cancel-report',
                    'root'      => true,
                    'roles'     => ['manager','counter-manager','operation-manager','counter-master','operation-master','supervisor'],
                    'new-tab'   => false,
                ],
                [
                    'title'     => 'Counter Credit ',
                    'icon'      => 'far fa-credit-card',
                    'page'      => 'counter-credits',
                    'root'      => true,
                    'roles'     => ['manager','counter-manager','operation-manager','counter-master','operation-master'],
                    'new-tab'   => false,
                ],
                [
                    'title'     => 'Transaction Report',
                    'icon'      => 'fas fa-newspaper',
                    'page'      => 'counter-transaction-report',
                    'root'      => true,
                    'roles'     => ['manager','counter-manager','operation-manager','counter-master','operation-master'],
                    'new-tab'   => false,
                ]
            ]
        ],
        // Reports Menu
        [
            'title'     => 'Reports',
            'icon'      => 'far fa-copy',
            'root'      => true,
            'roles'     => ['super-admin','admin','operation-admin','accountant'],
            'submenu'   => [
                [
                    'title'     => 'Sales Report',
                    'icon'      => 'fas fa-file-alt',
                    'page'      => 'sales-report',
                    'root'      => true,
                    'roles'     => ['super-admin','admin','operation-admin','accountant'],
                    'new-tab'   => false,
                ],
                [
                    'title'     => 'Booking Report',
                    'icon'      => 'far fa-file-alt',
                    'page'      => 'booking-report',
                    'root'      => true,
                    'roles'     => ['super-admin','admin','operation-admin','accountant'],
                    'new-tab'   => false,
                ],
                [
                    'title'     => 'Cancel Report',
                    'icon'      => 'far fa-file-excel',
                    'page'      => 'cancel-report',
                    'root'      => true,
                    'roles'     => ['super-admin','admin','operation-admin','accountant'],
                    'new-tab'   => false,
                ],
                [
                    'title'     => 'Online Sales Report',
                    'icon'      => 'fas fa-globe',
                    'page'      => 'online-sales-report',
                    'root'      => true,
                    'roles'     => ['super-admin','admin','operation-admin','accountant'],
                    'new-tab'   => false,
                ],
                [
                    'title'     => 'Counter Recharge Report',
                    'icon'      => 'far fa-money-bill-alt',
                    'page'      => 'counters-recharge-report',
                    'root'      => true,
                    'roles'     => ['super-admin','admin','operation-admin','accountant'],
                    'new-tab'   => false,
                ],
                [
                    'title'     => 'Counter Transaction Report',
                    'icon'      => 'fas fa-list-alt',
                    'page'      => 'counters-transaction-report',
                    'root'      => true,
                    'roles'     => ['super-admin','admin','operation-admin','accountant'],
                    'new-tab'   => false,
                ],
                [
                    'title'     => 'Trip Sheet Report',
                    'icon'      => 'fas fa-th-list',
                    'page'      => 'trip-sheet-report',
                    'root'      => true,
                    'roles'     => ['super-admin','admin','operation-admin','accountant'],
                    'new-tab'   => false,
                ],
                [
                    'title'     => 'Zonal Sales Summary',
                    'icon'      => 'fas fa-th-large',
                    'page'      => 'zonal-sales-summary',
                    'root'      => true,
                    'roles'     => ['super-admin','admin','operation-admin','accountant'],
                    'new-tab'   => false,
                ],
                [
                    'title'     => 'Route Sales Summary',
                    'icon'      => 'fas fa-route',
                    'page'      => 'route-sales-summary',
                    'root'      => true,
                    'roles'     => ['super-admin','admin','operation-admin','accountant'],
                    'new-tab'   => false,
                ],
                [
                    'title'     => 'Counter Sales Summary',
                    'icon'      => 'fas fa-store-alt',
                    'page'      => 'counter-sales-summary',
                    'root'      => true,
                    'roles'     => ['super-admin','admin','operation-admin','accountant'],
                    'new-tab'   => false,
                ],
                [
                    'title'     => 'Online Sales Summary',
                    'icon'      => 'fas fa-globe',
                    'page'      => 'online-sales-summary',
                    'root'      => true,
                    'roles'     => ['super-admin','admin','operation-admin','accountant'],
                    'new-tab'   => false,
                ],
                [
                    'title'     => 'Bus Sales Summary',
                    'icon'      => 'fas fa-bus',
                    'page'      => 'bus-sales-summary',
                    'root'      => true,
                    'roles'     => ['super-admin','admin','operation-admin','accountant'],
                    'new-tab'   => false,
                ],
                [
                    'title'     => 'Bus Status Report',
                    'icon'      => 'fas fa-bus',
                    'page'      => 'bus-status-report',
                    'root'      => true,
                    'roles'     => ['super-admin','admin','operation-admin','accountant'],
                    'new-tab'   => false,
                ],
                [
                    'title'     => 'Bus & Counter Summary',
                    'icon'      => 'fas fa-bus',
                    'page'      => 'bus-and-counter-summary',
                    'root'      => true,
                    'roles'     => ['super-admin','admin','operation-admin','accountant'],
                    'new-tab'   => false,
                ],
                [
                    'title'     => 'Bus Income & Expense',
                    'icon'      => 'fas fa-bus-alt',
                    'page'      => 'bus-income-expense-report',
                    'root'      => true,
                    'roles'     => ['super-admin','accountant'],
                    'new-tab'   => false,
                ],
                [
                    'title'     => 'Company Revenue Report',
                    'icon'      => 'fas fa-landmark',
                    'page'      => 'company-revenue-report',
                    'root'      => true,
                    'roles'     => ['super-admin','accountant'],
                    'new-tab'   => false,
                ]
            ]
        ],
        // Reports Menu
        [
            'title'     => 'Billing Reports',
            'icon'      => 'fas fa-file-invoice',
            'root'      => true,
            'roles'     => ['super-admin','admin','operation-admin','accountant'],
            'submenu'   => [
                [
                    'title'     => 'Counter Sales Invoice',
                    'icon'      => 'fas fa-store-alt',
                    'page'      => 'counter-sales-invoice',
                    'root'      => true,
                    'roles'     => ['super-admin','admin','operation-admin','accountant'],
                    'new-tab'   => false,
                ],
                [
                    'title'     => 'Online Sales Invoice',
                    'icon'      => 'fas fa-globe',
                    'page'      => 'online-sales-invoice',
                    'root'      => true,
                    'roles'     => ['super-admin','admin','operation-admin','accountant'],
                    'new-tab'   => false,
                ],
                [
                    'title'     => 'Counter SMS Invoice',
                    'icon'      => 'fas fa-sms',
                    'page'      => 'counter-sms-invoice',
                    'root'      => true,
                    'roles'     => ['super-admin','admin','operation-admin','accountant'],
                    'new-tab'   => false,
                ],
                [
                    'title'     => 'Online SMS Invoice',
                    'icon'      => 'fas fa-sms',
                    'page'      => 'online-sms-invoice',
                    'root'      => true,
                    'roles'     => ['super-admin','admin','operation-admin','accountant'],
                    'new-tab'   => false,
                ],
            ]
        ]
    ]
];
