/* ------------------------------------------------------------------------------
*
*  Finance and payments page
*
*  # Pricing configurations. Send data process description you can find in /Documentation/plugins_forms.html inside of thr theme
*
* ---------------------------------------------------------------------------- */

//*******************REPORT PAYMENT TAB*******************

// Area chart
// ------------------------------


// Initialize chart
google.load("visualization", "1", {packages:["corechart"]});
google.setOnLoadCallback(drawAreaChart);

// Chart settings
function drawAreaChart() {

    // Data
    var data = google.visualization.arrayToDataTable([
        ['Day', 'Sum'],
        ['1',  5],
        ['2',  2],
        ['3',  0],
        ['4',  0],
        ['5',  6],
        ['6',  8],
        ['7',  2],
        ['8',  14],
        ['9',  18],
        ['10',  18],
        ['11',  12],
        ['12',  8],
        ['13',  0],
        ['14',  4],
        ['15',  6],
        ['16',  14],
        ['17',  8],
        ['18',  20],
        ['19',  14],
        ['20',  0],
        ['21',  18],
        ['22',  2],
        ['23',  20],
        ['24',  6],
        ['25',  12],
        ['26',  4],
        ['27',  0],
        ['28',  0],
        ['29',  0],
        ['300',  0]
    ]);


    // Options
    var options = {
        fontName: 'Roboto',
        height: 400,
        curveType: 'function',
        fontSize: 12,
        areaOpacity: 0.4,
        chartArea: {
            left: '5%',
            width: '90%',
            height: 350
        },
        series: {
            0: { color: '#5aa118' }
        },
        pointSize: 4,
        tooltip: {
            textStyle: {
                fontName: 'Roboto',
                fontSize: 13
            }
        },
        vAxis: {
            title: '',
            titleTextStyle: {
                fontSize: 13,
                italic: false,
                minValue: 0,
                ticks: [0, 2, 4, 6, 8, 10, 12, 14, 16, 18, 20],
                format: '$'
            },
            gridarea:{
                color: '#e5e5e5',
                count: 10
            },
            minValue: 0
        },
        legend: {
            position: 'top',
            alignment: 'end',
            textStyle: {
                fontSize: 12
            }
        }
    };

    // Draw chart
    var area_chart = new google.visualization.AreaChart($('#google-area')[0]);
    area_chart.draw(data, options);
}


$(function() {

    //*******************REPORT PAYMENT TAB*******************

    // Resize chart
    // ------------------------------


    // Resize chart on sidebar width change and window resize
    $(window).on('resize', resize);
    $(".sidebar-control").on('click', resize);

    // Resize function
    function resize() {
        drawAreaChart();
    }

    //********SALES REPORT / DEPOSIT REPORT TABS**************

    // Table setup
    // ------------------------------

    // Setting datatable defaults
    $.extend( $.fn.dataTable.defaults, {
        autoWidth: false,
        "bSort": false,
        columnDefs: [{ 
            orderable: false,
            width: '100px',
            // targets: [ 5 ]
        }],
        dom: '<"datatable-header"fl><"datatable-scroll"t><"datatable-footer"ip>',
        language: {
            search: '<span>Filter:</span> _INPUT_',
            lengthMenu: '<span>Show:</span> _MENU_',
            paginate: { 'first': 'First', 'last': 'Last', 'next': '&rarr;', 'previous': '&larr;' }
        },
        drawCallback: function () {
            $(this).find('tbody tr').slice(-3).find('.dropdown, .btn-group').addClass('dropup');
        },
        preDrawCallback: function() {
            $(this).find('tbody tr').slice(-3).find('.dropdown, .btn-group').removeClass('dropup');
        }
    });


    // Single row selection
    var singleSelect = $('.datatable-selection-single').DataTable();
    $('.datatable-selection-single tbody').on('click', 'tr', function() {
        if ($(this).hasClass('success')) {
            $(this).removeClass('success');
        }
        else {
            singleSelect.$('tr.success').removeClass('success');
            $(this).addClass('success');
        }
    });


    // External table additions
    // ------------------------------

    // Add placeholder to the datatable filter option
    $('.dataTables_filter input[type=search]').attr('placeholder','Type to filter...');


    // Enable Select2 select for the length option
    $('.dataTables_length select').select2({
        minimumResultsForSearch: Infinity,
        width: 'auto'
    });


    // Enable Select2 select for individual column searching
    $('.filter-select').select2();




    //
    // Button DateRange picker
    //

    // Initialize with options
    $('.daterange-ranges-sales').daterangepicker(
        {
            startDate: moment().subtract('days', 29),
            endDate: moment(),
            minDate: '01/01/2012',
            maxDate: '12/31/2016',
            dateLimit: { days: 60 },
            ranges: {
                'Today': [moment(), moment()],
                'Yesterday': [moment().subtract('days', 1), moment().subtract('days', 1)],
                'Last 7 Days': [moment().subtract('days', 6), moment()],
                'Last 30 Days': [moment().subtract('days', 29), moment()],
                'This Month': [moment().startOf('month'), moment().endOf('month')],
                'Last Month': [moment().subtract('month', 1).startOf('month'), moment().subtract('month', 1).endOf('month')]
            },
            opens: 'left',
            applyClass: 'btn-small bg-slate-600',
            cancelClass: 'btn-small btn-default'
        },
        function(start, end) {
            $('.daterange-ranges-sales span').html(start.format('MMMM D, YYYY') + ' &nbsp; - &nbsp; ' + end.format('MMMM D, YYYY'));
        }
    );

    // Display date format
    $('.daterange-ranges-sales span').html(moment().subtract('days', 29).format('MMMM D, YYYY') + ' &nbsp; - &nbsp; ' + moment().format('MMMM D, YYYY'));

    // Initialize with options
    $('.daterange-ranges-deposit').daterangepicker(
        {
            startDate: moment().subtract('days', 29),
            endDate: moment(),
            minDate: '01/01/2012',
            maxDate: '12/31/2016',
            dateLimit: { days: 60 },
            ranges: {
                'Today': [moment(), moment()],
                'Yesterday': [moment().subtract('days', 1), moment().subtract('days', 1)],
                'Last 7 Days': [moment().subtract('days', 6), moment()],
                'Last 30 Days': [moment().subtract('days', 29), moment()],
                'This Month': [moment().startOf('month'), moment().endOf('month')],
                'Last Month': [moment().subtract('month', 1).startOf('month'), moment().subtract('month', 1).endOf('month')]
            },
            opens: 'left',
            applyClass: 'btn-small bg-slate-600',
            cancelClass: 'btn-small btn-default'
        },
        function(start, end) {
            $('.daterange-ranges-deposit span').html(start.format('MMMM D, YYYY') + ' &nbsp; - &nbsp; ' + end.format('MMMM D, YYYY'));
        }
    );

    // Display date format
    $('.daterange-ranges-deposit span').html(moment().subtract('days', 29).format('MMMM D, YYYY') + ' &nbsp; - &nbsp; ' + moment().format('MMMM D, YYYY'));




    //**********************PRICING TAB***********************


    // Override defaults
    // ------------------------------

    // Disable highlight
    $.fn.editable.defaults.highlight = false;

    // Output template
    $.fn.editableform.template = '<form class="editableform">' +
        '<div class="control-group">' +
        '<div class="editable-input"></div> <div class="editable-buttons"></div>' +
        '<div class="editable-error-block"></div>' +
        '</div> ' +
        '</form>'

    // Set popup mode as default
    $.fn.editable.defaults.mode = 'popup';

    // Buttons
    $.fn.editableform.buttons =
        '<button type="submit" class="btn bg-teal-400 btn-icon editable-submit"><i class="icon-check"></i></button>' +
        '<button type="button" class="btn btn-default btn-icon editable-cancel"><i class="icon-x"></i></button>';




    // Demo settings
    // ------------------------------

    // Toggle editable state bronze
    var toggleState = document.querySelector('.switchery-bronze');
    var toggleStateInit = new Switchery(toggleState);
    toggleState.onchange = function() {
        if(toggleState.checked) {
            $('.editable-bronze .editable').editable('enable');
        }
        else {
            $('.editable-bronze .editable').editable('disable');
        }
    };

    // Toggle editable state silver
    var toggleState2 = document.querySelector('.switchery-silver');
    var toggleStateInit2 = new Switchery(toggleState2);
    toggleState2.onchange = function() {
        if(toggleState2.checked) {
            $('.editable-silver .editable').editable('enable');
        }
        else {
            $('.editable-silver .editable').editable('disable');
        }
    };

    // Toggle editable state gold
    var toggleState3 = document.querySelector('.switchery-gold');
    var toggleStateInit3 = new Switchery(toggleState3);
    toggleState3.onchange = function() {
        if(toggleState3.checked) {
            $('.editable-gold .editable').editable('enable');
        }
        else {
            $('.editable-gold .editable').editable('disable');
        }
    };

    // Toggle editable state gold
    var toggleState4 = document.querySelector('.switchery-platinum');
    var toggleStateInit4 = new Switchery(toggleState4);
    toggleState4.onchange = function() {
        if(toggleState4.checked) {
            $('.editable-platinum .editable').editable('enable');
        }
        else {
            $('.editable-platinum .editable').editable('disable');
        }
    };




    // Basic editable components
    // ------------------------------


    // Empty field
    $('.editable-bronze > a').editable();

    $('.custom-editable > a').editable();

    $('.editable-silver > a').editable();

    $('.editable-platinum > a').editable();


    // Required text field
    $('.editable-gold > a').editable({
        validate: function(value) {
            if($.trim(value) == '') return 'This field is required';
        }
    });




    // Checkboxes/radios (Uniform)
    // ------------------------------

    // Default initialization
    $(".styled, .multiselect-container input").uniform({
        radioClass: 'choice'
    });

    // File input
    $(".file-styled").uniform({
        wrapperClass: 'bg-blue',
        fileButtonHtml: '<i class="icon-file-plus"></i>'
    });


    //
    // Contextual colors
    //

    // Primary
    $(".control-primary").uniform({
        radioClass: 'choice',
        wrapperClass: 'border-primary-600 text-primary-800'
    });

    // Danger
    $(".control-danger").uniform({
        radioClass: 'choice',
        wrapperClass: 'border-danger-600 text-danger-800'
    });

    // Success
    $(".control-success").uniform({
        radioClass: 'choice',
        wrapperClass: 'border-success-600 text-success-800'
    });

    // Warning
    $(".control-warning").uniform({
        radioClass: 'choice',
        wrapperClass: 'border-warning-600 text-warning-800'
    });

    // Info
    $(".control-info").uniform({
        radioClass: 'choice',
        wrapperClass: 'border-info-600 text-info-800'
    });

    // Custom color
    $(".control-custom").uniform({
        radioClass: 'choice',
        wrapperClass: 'border-indigo-600 text-indigo-800'
    });


    //**********************INVOICES TAB***********************




    //**********************INVOICES GRID***********************

    // Change vertical orientation of last 3 dropdowns in table
    $('.content > .row').slice(-1).find('.dropdown, .btn-group').addClass('dropup');


    // Styled checkboxes, radios
    $('.styled').uniform();




    //**********************INVOICES ARCHIVE***********************

    // Table setup
    // ------------------------------

    // Initialize
    $('.invoice-archive').DataTable({
        autoWidth: false,
        columnDefs: [
            {
                width: '30px',
                targets: 0
            },
            {
                visible: false,
                targets: 1
            },
            {
                orderable: false,
                width: '100px',
                targets: 7
            },
            {
                width: '15%',
                targets: [4, 5]
            },
            {
                width: '15%',
                targets: 6
            },
            {
                width: '15%',
                targets: 3
            }
        ],
        order: [[ 0, 'desc' ]],
        dom: '<"datatable-header"fl><"datatable-scroll-lg"t><"datatable-footer"ip>',
        language: {
            search: '<span>Filter:</span> _INPUT_',
            lengthMenu: '<span>Show:</span> _MENU_',
            paginate: { 'first': 'First', 'last': 'Last', 'next': '&rarr;', 'previous': '&larr;' }
        },
        lengthMenu: [ 25, 50, 75, 100 ],
        displayLength: 25,
        drawCallback: function ( settings ) {
            var api = this.api();
            var rows = api.rows( {page:'current'} ).nodes();
            var last=null;

            api.column(1, {page:'current'} ).data().each( function ( group, i ) {
                if ( last !== group ) {
                    $(rows).eq( i ).before(
                        '<tr class="active border-double"><td colspan="8" class="text-semibold">'+group+'</td></tr>'
                    );

                    last = group;
                }
            });

            $('.tab-invoice-archive .select').select2({
                width: '150px',
                minimumResultsForSearch: Infinity
            });

            $(this).find('tbody tr').slice(-3).find('.dropdown, .btn-group').addClass('dropup');
        },
        preDrawCallback: function(settings) {
            $(this).find('tbody tr').slice(-3).find('.dropdown, .btn-group').removeClass('dropup');
            $('.select').select2().select2('destroy');
        }
    });



    // External table additions
    // ------------------------------

    // Add placeholder to the datatable filter option
    $('.tab-invoice-archive .dataTables_filter input[type=search]').attr('placeholder','Type to filter...');


    // Enable Select2 select for the length option
    $('.tab-invoice-archive .dataTables_length select').select2({
        minimumResultsForSearch: Infinity,
        width: 'auto'
    });




    //********SALES REPORT / DEPOSIT REPORT TABS**************

    //
    // Select2 initialization
    //

    // Default initialization
    $('.select').select2({
        minimumResultsForSearch: Infinity
    });
});
