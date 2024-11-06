<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NoticeController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::middleware(['tenant.identification'])->group(function () {
    Auth::routes();
    Route::middleware('auth')->group(function () {
        Route::get('/', 'HomeController@dashboard');
        Route::get('/home', 'HomeController@dashboard')->name('home');
        Route::post('/monthly-sales-data', 'HomeController@monthlySalesData')->name('monthly-sales-data');
        Route::get('/general-settings', 'GeneralSettingsController@edit')->name('general-settings.edit');
        Route::put('/general-settings', 'GeneralSettingsController@update')->name('general-settings.update');
        Route::resource('users', 'UserController');
        Route::put('users/{id}/change-password', 'UserController@changePassword')->name('users.change-password');
        Route::resource('user-profile', 'UserProfileController');
        Route::resource('staffs', 'StaffController');
        Route::get('passengers/list', 'PassengerController@list')->name('passengers.list');
        Route::resource('passengers', 'PassengerController');

        Route::resource('seat-layouts', 'SeatLayoutController');
        Route::resource('buses', 'BusController');
        Route::resource('stations', 'StationController');
        Route::get('counters/route-wise-commission/{id?}', 'CounterController@routeWiseCommission')->name('counters.route-wise-commission');
        Route::resource('counters', 'CounterController');
        Route::post('counter-credit-manage/verify', 'CounterCreditManageController@verify')->name('counter-credit-manage.verify');
        Route::resource('counter-credit-manage', 'CounterCreditManageController');
        Route::resource('zones', 'ZoneController');
        Route::resource('routes', 'RouteController');
        Route::get('fares/route-wise-stations/{id?}', 'FareController@routeWiseStations')->name('fares.route-wise-stations');
        Route::resource('fares', 'FareController');
        Route::resource('counter-credits', 'CounterCreditController');

        Route::resource('income-purposes', 'IncomePurposeController');
        Route::resource('expense-purposes', 'ExpensePurposeController');
        Route::resource('bus-income-expense', 'BusIncomeExpenseController');
        Route::post('/bus-income-expense/bus-list-by-date', 'BusIncomeExpenseController@getBusListByExpenseDate')->name('bus-income-expense.bus-list-by-date');
        Route::post('/bus-income-expense/route-list-by-bus-and-date', 'BusIncomeExpenseController@getRouteListByBusAndDate')->name('bus-income-expense.route-list-by-bus-and-date');
        Route::post('/bus-income-expense/trip-list-by-date-and-route', 'BusIncomeExpenseController@getTripListByDateBusAndRoute')->name('bus-income-expense.trip-list-by-date-and-route');
        Route::post('/bus-income-expense/income-expense-list-by-date-bus-and-route', 'BusIncomeExpenseController@getIncomeExpenseListByDateBusAndRoute')->name('bus-income-expense.income-expense-list-by-date-bus-and-route');
        Route::get('/company-income-expense', 'CompanyIncomeExpenseController@index')->name('company-income-expense.index');
        Route::get('/company-income-expense/create-income', 'CompanyIncomeExpenseController@createIncome')->name('create-company-income');
        Route::post('/company-income-expense/store-income', 'CompanyIncomeExpenseController@storeIncome')->name('store-company-income');
        Route::get('/company-income-expense/{id}/edit-income', 'CompanyIncomeExpenseController@editIncome')->name('edit-company-income');
        Route::post('/company-income-expense/{id}/update-income', 'CompanyIncomeExpenseController@updateIncome')->name('update-company-income');
        Route::get('/company-income-expense/create-expense', 'CompanyIncomeExpenseController@createExpense')->name('create-company-expense');
        Route::post('/company-income-expense/store-expense', 'CompanyIncomeExpenseController@storeExpense')->name('store-company-expense');
        Route::get('/company-income-expense/{id}/edit-expense', 'CompanyIncomeExpenseController@editExpense')->name('edit-company-expense');
        Route::post('/company-income-expense/{id}/update-expense', 'CompanyIncomeExpenseController@updateExpense')->name('update-company-expense');

        Route::get('schedules/seat-layout/{id?}', 'ScheduleController@seatLayoutPlan')->name('schedules.seat-layout');
        Route::get('schedules/route-stations', 'ScheduleController@routeStations')->name('schedules.route-stations');
        Route::get('schedules/station-counters/{id?}', 'ScheduleController@getStationCounterList')->name('schedules.station-counters');
        Route::post('schedules/{id}/update-counter', 'ScheduleController@updateCounter')->name('schedules.update-counter');
        Route::post('schedules/{id}/update-counter-permission', 'ScheduleController@updateCounterPermission')->name('schedules.update-counter-permission');
        Route::post('schedules/{id}/update-online-counter-permission', 'ScheduleController@updateOnlineCounterPermission')->name('schedules.update-online-counter-permission');
        Route::post('schedules/{id}/update-ondays', 'ScheduleController@updateOnDays')->name('schedules.update-ondays');
        Route::post('schedules/{id}/permitted-seat-layout', 'ScheduleController@permittedSeatLayout')->name('schedules.permitted-seat-layout');
        Route::post('schedules/{id}/monthly-on-days', 'ScheduleController@getDateWiseScheduleOnDaysByMonth')->name('schedules.monthly-on-days');
        Route::post('schedules/clone', 'ScheduleController@scheduleClone')->name('schedules.clone');
        Route::resource('schedules', 'ScheduleController');

        Route::get('trips/seat-layout/{id?}', 'TripController@seatLayoutPlan')->name('trips.seat-layout');
        Route::get('trips/route-stations', 'TripController@routeStations')->name('trips.route-stations');
        Route::get('trips/station-counters/{id?}', 'TripController@getStationCounterList')->name('trips.station-counters');
        Route::post('trips/{id}/update-counter', 'TripController@updateCounter')->name('trips.update-counter');
        Route::post('trips/{id}/update-counter-permission', 'TripController@updateCounterPermission')->name('trips.update-counter-permission');
        Route::post('trips/{id}/update-online-counter-permission', 'TripController@updateOnlineCounterPermission')->name('trips.update-online-counter-permission');
        Route::post('trips/{id}/permitted-seat-layout', 'TripController@permittedSeatLayout')->name('trips.permitted-seat-layout');
        Route::post('trips/update-info/{id?}', 'TripController@updateTripInfo')->name('trips.update-info');
        Route::resource('trips', 'TripController');

        Route::get('/ticket-issue', 'TicketIssueController@index')->name('ticket-issue');
        Route::post('/ticket-issue/trip-details', 'TicketIssueController@showTripDetails')->name('ticket-issue.trip-details');
        Route::get('/ticket-issue/trip-sheet/{id?}', 'TicketIssueController@showTripSheet')->name('ticket-issue.trip-sheet');
        Route::post('/ticket-issue/trip-list-info-update', 'TicketIssueController@showUpdatedTripListInfo')->name('ticket-issue.trip-list-info-update');
        Route::post('/ticket-issue/trip-seatplan-update', 'TicketIssueController@showUpdatedTripSeatPlan')->name('ticket-issue.trip-seatplan-update');
        Route::post('/ticket-issue/trip-selected-seats-update', 'TicketIssueController@updateSelectedSeats')->name('ticket-issue.trip-selected-seats-update');
        Route::post('/ticket-issue/ticket-book-or-sell', 'TicketIssueController@ticketBookOrSell')->name('ticket-issue.ticket-book-or-sell');
        Route::post('/ticket-issue/booked-ticket-sold', 'TicketIssueController@bookedTicketSold')->name('ticket-issue.booked-ticket-sold');
        Route::post('/ticket-issue/sold-ticket-seat-cancel', 'TicketIssueController@soldTicketSeatCancel')->name('ticket-issue.sold-ticket-seat-cancel');
        Route::post('/ticket-issue/ticket-cancel', 'TicketIssueController@ticketCancel')->name('ticket-issue.ticket-cancel');
        Route::post('/ticket-issue/ticket-details', 'TicketIssueController@ticketDetails')->name('ticket-issue.ticket-details');
        Route::post('/ticket-issue/ticket-search', 'TicketIssueController@ticketSearchByMobileNumber')->name('ticket-issue.ticket-search');
        Route::post('/ticket-issue/passenger-name-update', 'TicketIssueController@updatePassengerName')->name('ticket-issue.passenger-name-update');
        Route::post('/ticket-issue/ticket-authority-change', 'TicketIssueController@changeTicketAuthority')->name('ticket-issue.ticket-authority-change');
        Route::get('/ticket-issue/counter-masters/{id?}', 'TicketIssueController@getCounterMasterList')->name('ticket-issue.counter-masters');
        Route::get('/ticket-issue/passenger-info/{mobile?}', 'TicketIssueController@getPassengerByMobileNumber')->name('ticket-issue.passenger-info');
        Route::get('/ticket-issue/ticket-sms-send/{id?}', 'TicketIssueController@ticketSmsSend')->name('ticket-issue.ticket-sms-send');
        Route::get('/ticket-issue/callerman-info/{mobile?}', 'TicketIssueController@getCallermanByMobileNumber')->name('ticket-issue.callerman-info');

        Route::get('/counter-sales-report', 'CounterReportsController@salesReport')->name('counter-sales-report');
        Route::get('/counter-booking-report', 'CounterReportsController@bookingReport')->name('counter-booking-report');
        Route::get('/counter-cancel-report', 'CounterReportsController@cancelReport')->name('counter-cancel-report');
        Route::get('/counter-transaction-report', 'CounterReportsController@transactionReport')->name('counter-transaction-report');

        Route::get('/sales-report', 'ReportsController@salesReport')->name('sales-report');
        Route::get('/booking-report', 'ReportsController@bookingReport')->name('booking-report');
        Route::get('/cancel-report', 'ReportsController@cancelReport')->name('cancel-report');
        Route::get('/online-sales-report', 'ReportsController@onlineSalesReport')->name('online-sales-report');
        Route::get('/counters-recharge-report', 'ReportsController@counterRechargeReport')->name('counters-recharge-report');
        Route::get('/counters-transaction-report', 'ReportsController@counterTransactionReport')->name('counters-transaction-report');
        Route::get('/trip-sheet-report', 'ReportsController@tripSheetReport')->name('trip-sheet-report');
        Route::get('/zonal-sales-summary', 'ReportsController@zonalSalesSummary')->name('zonal-sales-summary');
        Route::get('/route-sales-summary', 'ReportsController@routeSalesSummary')->name('route-sales-summary');
        Route::get('/counter-sales-summary', 'ReportsController@counterSalesSummary')->name('counter-sales-summary');
        Route::get('/online-sales-summary', 'ReportsController@onlineSalesSummary')->name('online-sales-summary');
        Route::get('/bus-sales-summary', 'ReportsController@busSalesSummary')->name('bus-sales-summary');
        Route::get('/bus-status-report', 'ReportsController@busStatusReport')->name('bus-status-report');
        Route::get('/bus-and-counter-summary', 'ReportsController@busAndCounterSummary')->name('bus-and-counter-summary');
        Route::get('/bus-income-expense-report', 'ReportsController@busIncomeExpenseReport')->name('bus-income-expense-report');
        Route::get('/bus-income-expense-details-report/{id?}', 'ReportsController@showBusDetailsReport')->name('bus-income-expense-details-report');
        Route::get('/company-revenue-report', 'ReportsController@companyRevenueReport')->name('company-revenue-report');
        Route::post('/company-details-revenue-report', 'ReportsController@showCompanyRevenueDetailsReport')->name('company-details-revenue-report');
        Route::post('/bus-list-by-zone-route', 'ReportsController@getBusList')->name('bus-list-by-zone-route');

        Route::get('/counter-sales-invoice', 'BillingReportsController@counterSalesInvoice')->name('counter-sales-invoice');
        Route::get('/online-sales-invoice', 'BillingReportsController@onlineSalesInvoice')->name('online-sales-invoice');
        Route::get('/counter-sms-invoice', 'BillingReportsController@counterSmsInvoice')->name('counter-sms-invoice');
        Route::get('/online-sms-invoice', 'BillingReportsController@onlineSmsInvoice')->name('online-sms-invoice');

        Route::get('comadminlogs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');
        Route::resource('notices', 'NoticeController');
//        Route::get('notice-board',[NoticeController::class,'index'])->name('notice-board');
        Route::get('notice-create',[NoticeController::class,'create'])->name('notice-create');
//        Route::get('/notices-view', [NoticeController::class, 'views'])->name('notices.views');
        Route::get('/notices-view', [NoticeController::class, 'index'])->name('notices-index');
        Route::get('/notices-view', [NoticeController::class, 'index'])->name('notices-');

        Route::resource('notices', NoticeController::class);


    });
});

