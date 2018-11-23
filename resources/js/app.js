
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

//global.$ = global.jQuery = require('jquery');
//require('./bootstrap');

window.Vue = require('vue');

require('admin-lte');

window.datatables = require('datatables.net-bs');

/*var makati = $('#makati').DataTable({
    scrollX: true,
    autoWidth: true,
    scrollCollapse: true,
    fixedColumns:   {
        leftColumns: 1,
    },
    ajax: '/makatiEmployee',
    columns: [
        {data: 'employee.fname', name: 'name'},
        {data: 'employee.contact_personal', name: 'contact_personal'},
        {data: 'employee.address', name: 'address'},
        {data: 'employee.hired_date', name: 'hired_date'},
        {data: "action", orderable:false,searchable:false}
    ],
});
*/