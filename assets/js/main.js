/*

 Main javascript functions to init most of the elements

 #1. FORM VALIDATION
 #2. CK EDITOR
 #3. SORTABLE -- TASKS
 #4. CHARTJS CHARTS
 #4.1 LINE CHARTS
 #4.2 BAR CHARTS
 #4.3 PIE & DOUGHNUT CHARTS

 #5  MENU/NAVIGATION
 #6. FULL BODY COLORED SCROLL
 #7. NAVIGATION SCROLL
 #8. BOOTSTRAP RELATED JS ACTIVATIONS

 */

'use strict';
$(function () {
    /*----------------------------------------
     // - #0. COLOR VARIABLES
     ----------------------------------------*/

    var primaryColor = '#18BCC9';
    var primaryAlphaDot5 = 'rgba(24, 188, 201,0.5)';
    var primaryAlpha = 'rgba(24, 188, 201,0)';

    var whiteColor = '#fff';
    var whiteAlphaDot5 = 'rgba(255,255,255,0.5)';
    var whiteAlphaDot25 = 'rgba(255,255,255,0.25)';
    var whiteAlpha = 'rgba(255,255,255,0)';

    var lightColor ='#f1f1f1'

    var darkColor = '#2a3f5a';

    var secondaryColor = '#a5b5c5';
    var secondaryAlphaDot5 = 'rgba(165,181,197,0.5)';

    var successColor = '#66bb6a';
    var successAlphaDot5 = 'rgba(102,187,106,0.5)';

    var dangerColor = '#f65f6e';
    var dangerAlphaDot5 = 'rgba(246,95,110,0.5)';

    /*----------------------------------------
     // - #1. FORM VALIDATION
     ----------------------------------------*/
    if ($('#needs-validation').length) {
        "use strict";
        var form = document.getElementById("needs-validation");
        form.addEventListener("submit", function(event) {
            if (form.checkValidity() == false) {
                event.preventDefault();
                event.stopPropagation();
            }
            form.classList.add("was-validated");
        }, false);
    }





	"use strict";
    if ($("#fullCalendar").length) {
        var calendar, d, date, m, y;

        date = new Date();

        d = date.getDate();

        m = date.getMonth();

        y = date.getFullYear();

        calendar = $("#fullCalendar").fullCalendar({
            header: {
                left: "prev,next today",
                center: "title",
                right: "month,agendaWeek,agendaDay"
            },
            selectable: true,
            selectHelper: true,
            select: function select(start, end, allDay) {
                var title;
                title = prompt("Event Title:");
                if (title) {
                    calendar.fullCalendar("renderEvent", {
                        title: title,
                        start: start,
                        end: end,
                        allDay: allDay
                    }, true);
                }
                return calendar.fullCalendar("unselect");
            },
            editable: true,
            events: [{
                title: "Long Event",
                start: new Date(y, m, 3, 12, 0),
                end: new Date(y, m, 7, 14, 0)
            }, {
                title: "Lunch",
                start: new Date(y, m, d, 12, 0),
                end: new Date(y, m, d + 2, 14, 0),
                allDay: false
            }, {
                title: "Click for Google",
                start: new Date(y, m, 28),
                end: new Date(y, m, 29),
                url: "http://google.com/"
            }]
        });
    }

    /*----------------------------------------
     // - #2. CK EDITOR
     ----------------------------------------*/
	 "use strict";
    if ($('#textEditor').length) {
        CKEDITOR.replace('textEditor');
    }

    /*----------------------------------------
     // - #3. SORTABLE -- TASKS
     ----------------------------------------*/
	 "use strict";
    if($('#sortable1').length){
        var todo = document.getElementById('todo');
        var inprog = document.getElementById('inprogress');
        var complete = document.getElementById('taskdone');

        Sortable.create(todo, {
            group: "shared",
            scroll: true,
            sort: true
        });

        Sortable.create(inprog, {
            group: "shared",
            scroll: true,
            sort: true
        });

        Sortable.create(complete, {
            group: "shared",
            scroll: true,
            sort: true
        });
    }

	"use strict";
    if($('.sparklineBarChartPrimary').length){
        var myValue = [32, 38, 36, 35, 38, 37, 35, 34, 36, 38, 36,];
        $('.sparklineBarChartPrimary').sparkline(myValue,{
            type:'bar',
            barColor: primaryColor,
            height: "60",
            barWidth: 3,
            resize: true,
            barSpacing: 8
        });
    }

	"use strict";
    if($('.sparklineBarChartWhite').length){
        var myValue = [32, 38, 36, 35, 38, 37, 35, 34, 36, 38, 36,];
        $('.sparklineBarChartWhite').sparkline(myValue,{
            type:'bar',
            barColor: whiteColor,
            height: "60",
            barWidth: 3,
            resize: true,
            barSpacing: 8
        });
    }


    /*----------------------------------------
     // #4. CHARTJS CHARTS http://www.chartjs.org/
     ----------------------------------------*/

	 "use strict";
    if (typeof Chart !== 'undefined') {

        var fontFamily = 'Roboto';
        // set defaults
        Chart.defaults.global.defaultFontFamily = fontFamily;
        Chart.defaults.global.tooltips.titleFontSize = 14;
        Chart.defaults.global.tooltips.titleMarginBottom = 4;
        Chart.defaults.global.tooltips.displayColors = false;
        Chart.defaults.global.tooltips.bodyFontSize = 12;
        Chart.defaults.global.tooltips.xPadding = 10;
        Chart.defaults.global.tooltips.yPadding = 8;

        // init lite line chart if element exists

        // - #4.1 LINE CHARTS

        // Filled Line Chart //

		"use strict";
        if ($("#filledLineChart").length) {
            var filledLineChart = document.getElementById("filledLineChart").getContext('2d');

            var primaryGradient = filledLineChart.createLinearGradient(0, 0, 0, 200);
            primaryGradient.addColorStop(0, primaryAlphaDot5);
            primaryGradient.addColorStop(1, primaryAlpha);


            // line chart data
            var filledLineData = {
                labels: ["1", "2", "3", "4", "5", "6", "7", "8"],
                datasets: [{
                    label: "Visitors Graph",
                    fill: true,
                    backgroundColor: primaryGradient,
                    borderColor: primaryColor,
                    borderCapStyle: 'butt',
                    borderWidth: 2,
                    borderDash: [],
                    borderDashOffset: 0.0,
                    borderJoinStyle: 'miter',
                    pointBorderColor: "transparent",
                    pointBackgroundColor: primaryColor,
                    pointBorderWidth: 0,
                    pointHoverRadius: 4,
                    pointHoverBackgroundColor: primaryColor,
                    pointHoverBorderColor: primaryColor,
                    pointHoverBorderWidth: 0,
                    pointRadius: 3,
                    pointHitRadius: 10,
                    data: [16, 12, 24, 12, 15, 12, 25, 24]
                }]
            };

            // line chart init
            var filledLineChart = new Chart(filledLineChart, {
                type: 'line',
                data: filledLineData,
                options: {
                    legend: {
                        display: false
                    },
                    scales: {
                        xAxes: [{
                            ticks: {
                                fontSize: '11',
                                fontColor: secondaryColor
                            },
                            gridLines: {
                                color: lightColor,
                                zeroLineColor: lightColor
                            }
                        }],
                        yAxes: [{
                            /*display: true,*/
                            ticks: {
                                beginAtZero: true,
                                max: 40,
                                stepSize: 10,
                                fontSize: '11',
                                fontColor: secondaryColor
                            },
                            gridLines: {
                                color: 'transparent',
                                zeroLineColor: 'transparent'
                            }
                        }]
                    }
                }
            });
        }

        // Single Line Chart //

		"use strict";
        if ($("#singleLineChart").length) {

            var singleLineChart = document.getElementById("singleLineChart").getContext('2d');

            // line chart data
            var singleLineData = {
                labels: ["1", "2", "3", "4", "5", "6", "7", "8"],
                datasets: [{
                    label: "Visitors Graph",
                    fill: false,
                    borderColor: primaryColor,
                    borderCapStyle: 'butt',
                    borderWidth: 2,
                    borderDash: [],
                    borderDashOffset: 0.0,
                    borderJoinStyle: 'miter',
                    pointBorderColor: "transparent",
                    pointBackgroundColor: primaryColor,
                    pointBorderWidth: 0,
                    pointHoverRadius: 4,
                    pointHoverBackgroundColor: primaryColor,
                    pointHoverBorderColor: primaryColor,
                    pointHoverBorderWidth: 0,
                    pointRadius: 3,
                    pointHitRadius: 10,
                    data: [16, 12, 24, 12, 15, 12, 25, 24]
                }]
            };

            var singleLineChart = new Chart(singleLineChart, {
                type: 'line',
                data: singleLineData,
                options: {
                    legend: {
                        display: false
                    },
                    scales: {
                        xAxes: [{
                            ticks: {
                                fontSize: '11',
                                fontColor: secondaryColor
                            },
                            gridLines: {
                                color: lightColor,
                                zeroLineColor: lightColor
                            }
                        }],
                        yAxes: [{
                            /*display: true,*/
                            ticks: {
                                beginAtZero: true,
                                max: 40,
                                stepSize: 10,
                                fontSize: '11',
                                fontColor: secondaryColor
                            },
                            gridLines: {
                                color: 'transparent',
                                zeroLineColor: 'transparent'
                            }
                        }]
                    }
                }
            });
        }


		"use strict";
        if ($("#filledWhiteLineChart").length) {
            var filledWhiteLineChart = document.getElementById("filledWhiteLineChart").getContext('2d');

            var whiteGradient = filledWhiteLineChart.createLinearGradient(0, 0, 0, 200);
            whiteGradient.addColorStop(0, whiteAlphaDot5);
            whiteGradient.addColorStop(1, whiteAlpha);

            // line chart data
            var filledWhiteLineData = {
                labels: ["1", "2", "3", "4", "5", "6", "7", "8"],
                datasets: [{
                    label: "Visitors Graph",
                    fill: true,
                    backgroundColor: whiteGradient,
                    borderColor: whiteColor,
                    borderCapStyle: 'butt',
                    borderWidth: 2,
                    borderDash: [],
                    borderDashOffset: 0.0,
                    borderJoinStyle: 'miter',
                    pointBorderColor: "transparent",
                    pointBackgroundColor: whiteColor,
                    pointBorderWidth: 0,
                    pointHoverRadius: 4,
                    pointHoverBackgroundColor: whiteColor,
                    pointHoverBorderColor: whiteColor,
                    pointHoverBorderWidth: 0,
                    pointRadius: 3,
                    pointHitRadius: 10,
                    data: [16, 12, 24, 12, 15, 12, 25, 24]
                }]
            };

            // line chart init
            var filledWhiteLineChart = new Chart(filledWhiteLineChart, {
                type: 'line',
                data: filledWhiteLineData,
                options: {
                    legend: {
                        display: false
                    },
                    scales: {
                        xAxes: [{
                            ticks: {
                                fontSize: '11',
                                fontColor: whiteColor
                            },
                            gridLines: {
                                color: whiteAlphaDot25,
                                zeroLineColor: whiteAlphaDot25
                            }
                        }],
                        yAxes: [{
                            /*display: true,*/
                            ticks: {
                                beginAtZero: true,
                                max: 40,
                                stepSize: 10,
                                fontSize: '11',
                                fontColor: whiteColor
                            },
                            gridLines: {
                                color: 'transparent',
                                zeroLineColor: 'transparent'
                            }
                        }]
                    }
                }
            });
        }



        //Double Line Chart

		"use strict";
        if ($("#doubleLineChart").length) {
            var doubleLineChart = document.getElementById("doubleLineChart").getContext('2d');


            // line chart data
            var doubleLineData = {
                labels: ["1", "2", "3", "4", "5", "6", "7", "8"],
                datasets: [{
                    label: "Visitors Graph",
                    fill: false,
                    borderColor: primaryColor,
                    borderCapStyle: 'butt',
                    borderWidth: 2,
                    borderDash: [],
                    borderDashOffset: 0.0,
                    borderJoinStyle: 'miter',
                    pointBorderColor: "transparent",
                    pointBackgroundColor: primaryColor,
                    pointBorderWidth: 0,
                    pointHoverRadius: 4,
                    pointHoverBackgroundColor: primaryColor,
                    pointHoverBorderColor: primaryColor,
                    pointHoverBorderWidth: 0,
                    pointRadius: 3,
                    pointHitRadius: 10,
                    data: [16, 12, 24, 12, 15, 12, 25, 24]
                },{
                    label: "Downloads Graph",
                    fill: false,
                    borderColor: darkColor,
                    borderCapStyle: 'butt',
                    borderWidth: 2,
                    borderDash: [],
                    borderDashOffset: 0.0,
                    borderJoinStyle: 'miter',
                    pointBorderColor: "transparent",
                    pointBackgroundColor: darkColor,
                    pointBorderWidth: 0,
                    pointHoverRadius: 4,
                    pointHoverBackgroundColor: darkColor,
                    pointHoverBorderColor: darkColor,
                    pointHoverBorderWidth: 0,
                    pointRadius: 3,
                    pointHitRadius: 10,
                    data: [21, 25, 13, 25, 20, 24, 12, 13]
                }]
            };

            // line chart init
            var doubleLineChart = new Chart(doubleLineChart, {
                type: 'line',
                data: doubleLineData,
                options: {
                    legend: {
                        display: false
                    },
                    scales: {
                        xAxes: [{
                            ticks: {
                                fontSize: '11',
                                fontColor: secondaryColor
                            },
                            gridLines: {
                                color: lightColor,
                                zeroLineColor: lightColor
                            }
                        }],
                        yAxes: [{
                            display: true,
                            ticks: {
                                beginAtZero: true,
                                max: 40,
                                stepSize: 10,
                                fontSize: '11',
                                fontColor: secondaryColor
                            },
                            gridLines: {
                                color: 'transparent',
                                zeroLineColor: 'transparent'
                            }
                        }]
                    }
                }
            });
        }





        // - #4.2 BAR CHARTS

        // - Bar Chart --> Primary Color
		"use strict";
        if($('#barGraphPrimary').length) {

            var barGraphPrimary = document.getElementById("barGraphPrimary").getContext("2d");

            var barPrimaryData1 = {
                labels: ["January", "February", "March", "April", "May", "June", "July", "Aug", "Sep", "Oct"],
                datasets: [{
                    label: "Orders",
                    backgroundColor: primaryColor,
                    hoverBackgroundColor: primaryColor,
                    hoverBorderColor: primaryAlphaDot5,
                    hoverBorderWidth: 5,
                    data: [24, 42, 18, 34, 56, 28, 24, 42, 18, 34]
                }]
            };
            // -----------------
            // init bar chart
            // -----------------
            var myBarPrimary = new Chart(barGraphPrimary,
                {
                    type: 'bar',
                    data: barPrimaryData1,
                    options: {
                        scales: {
                            xAxes: [{
                                display: false,
                                ticks: {
                                    fontSize: '11',
                                    fontColor: secondaryColor
                                },
                                gridLines: {
                                    display: false,
                                    color: lightColor,
                                    zeroLineColor: lightColor
                                }
                            }],
                            yAxes: [{
                                ticks: {
                                    beginAtZero: true,
                                    fontColor: secondaryColor,
                                },
                                gridLines: {
                                    color: lightColor,
                                    zeroLineColor: primaryColor
                                }
                            }]
                        },
                        legend: {
                            display: false
                        },
                        animation: {
                            animateScale: true,
                            duration: 5000
                        }

                    }
                });
        }


        //- Bar Graph --> Gradient
		"use strict";
        if($('#barGraphGradient').length) {

            var barGraphGradient = document.getElementById("barGraphGradient").getContext("2d");

            var primaryGradient = barGraphGradient.createLinearGradient(0, 0, 0, 180);
            primaryGradient.addColorStop(0, primaryAlphaDot5);
            primaryGradient.addColorStop(1, primaryColor);

            var barGradientData1 = {
                labels: ["January", "February", "March", "April", "May", "June", "July", "Aug", "Sep", "Oct"],
                datasets: [{
                    label: "Orders",
                    backgroundColor: primaryGradient,
                    hoverBackgroundColor: primaryColor,
                    hoverBorderColor: primaryAlphaDot5,
                    hoverBorderWidth: 5,
                    data: [24, 42, 18, 34, 56, 28, 24, 42, 18, 34]
                }]
            };
            // -----------------
            // init bar chart
            // -----------------
            var myBarGradient = new Chart(barGraphGradient,
                {
                    type: 'bar',
                    data: barGradientData1,
                    options: {
                        scales: {
                            xAxes: [{
                                display: false,
                                ticks: {
                                    fontSize: '11',
                                    fontColor: secondaryColor
                                },
                                gridLines: {
                                    display: false,
                                    color: lightColor,
                                    zeroLineColor: lightColor
                                }
                            }],
                            yAxes: [{
                                ticks: {
                                    beginAtZero: true,
                                    fontColor: secondaryColor,
                                },
                                gridLines: {
                                    color: lightColor,
                                    zeroLineColor: primaryColor
                                }
                            }]
                        },
                        legend: {
                            display: false,
                        },
                        animation: {
                            animateScale: true
                        }
                    }
                });

        }

        //- Bar Graph --> White Outline With Primary Background

		"use strict";
        if($('#barGraphWhite').length) {

            var barGraphWhite = document.getElementById("barGraphWhite").getContext("2d");

            var barWhiteData1 = {
                labels: ["January", "February", "March", "April", "May", "June", "July", "Aug", "Sep", "Oct"],
                datasets: [{
                    label: "Orders",
                    backgroundColor: whiteAlpha,
                    hoverBackgroundColor: whiteColor,
                    borderColor: whiteColor,
                    hoverBorderColor: whiteColor,
                    borderWidth: 2,
                    data: [24, 42, 18, 34, 56, 28, 24, 42, 18, 34]
                }]
            };
            // -----------------
            // init bar chart
            // -----------------
            var myBarWhite = new Chart(barGraphWhite,
                {
                    type: 'bar',
                    data: barWhiteData1,
                    options: {
                        scales: {
                            xAxes: [{
                                display: false,
                                ticks: {
                                    fontSize: '11',
                                    fontColor: whiteAlphaDot5
                                },
                                gridLines: {
                                    display: false,
                                    color: 'rgba(255,255,255,0.15)',
                                    zeroLineColor: whiteAlphaDot5
                                }
                            }],
                            yAxes: [{
                                ticks: {
                                    beginAtZero: true,
                                    fontColor: whiteAlphaDot5,
                                },
                                gridLines: {
                                    color: 'rgba(255,255,255,0.15)',
                                    zeroLineColor: whiteAlphaDot5
                                }
                            }]
                        },
                        legend: {
                            display: false,
                        },
                        animation: {
                            animateScale: true,
                        }
                    }
                });

        }

        //- Bar Graph --> Dark Colors

		"use strict";
        if($('#barGraphDark').length) {

            var barGraphDark = document.getElementById("barGraphDark").getContext("2d");

            var barDarkData1 = {
                labels: ["January", "February", "March", "April", "May", "June", "July", "Aug", "Sep", "Oct"],
                datasets: [{
                    label: "Orders",
                    backgroundColor: darkColor,
                    hoverBackgroundColor: primaryColor,
                    hoverBorderColor: primaryAlphaDot5,
                    hoverBorderWidth: 5,
                    data: [24, 42, 18, 34, 56, 28, 24, 42, 18, 34]
                }]
            };
            // -----------------
            // init bar chart
            // -----------------
            var myBarDark = new Chart(barGraphDark,
                {
                    type: 'bar',
                    data: barDarkData1,
                    options: {
                        scales: {
                            xAxes: [{
                                display: false,
                                ticks: {
                                    fontSize: '11',
                                    fontColor: secondaryColor
                                },
                                gridLines: {
                                    display: false,
                                    color: lightColor,
                                    zeroLineColor: lightColor
                                }
                            }],
                            yAxes: [{
                                ticks: {
                                    beginAtZero: true,
                                    fontColor: secondaryColor,
                                },
                                gridLines: {
                                    color: lightColor,
                                    zeroLineColor: darkColor
                                }
                            }]
                        },
                        legend: {
                            display: false
                        },
                        animation: {
                            animateScale: true
                        }
                    }
                });

        }

        //- Bar Graph --> Light Grey Color

		"use strict";
        if($('#barGraphLight').length) {

            var barGraphLight = document.getElementById("barGraphLight").getContext("2d");

            var barLightData1 = {
                labels: ["January", "February", "March", "April", "May", "June", "July", "Aug", "Sep", "Oct"],
                datasets: [{
                    label: "Orders",
                    backgroundColor: secondaryColor,
                    hoverBackgroundColor: primaryColor,
                    hoverBorderColor: primaryAlphaDot5,
                    hoverBorderWidth: 5,
                    data: [24, 42, 18, 34, 56, 28, 24, 42, 18, 34]
                }]
            };
            // -----------------
            // init bar chart
            // -----------------
            var myBarLight = new Chart(barGraphLight,
                {
                    type: 'bar',
                    data: barLightData1,
                    options: {
                        scales: {
                            xAxes: [{
                                display: false,
                                ticks: {
                                    fontSize: '11',
                                    fontColor: secondaryColor
                                },
                                gridLines: {
                                    color: lightColor,
                                    zeroLineColor: lightColor
                                }
                            }],
                            yAxes: [{
                                display: true,
                                ticks: {
                                    beginAtZero: true,
                                    fontColor: secondaryColor,
                                },
                                gridLines: {
                                    color: lightColor,
                                    zeroLineColor: secondaryColor
                                }
                            }]
                        },
                        legend: {
                            display: false,
                        },
                        animation: {
                            animateScale: true,
                        }
                    }
                });

        }



        // - #4.3 PIE & DOUGHNUT CHARTS

        // Pie Chart
		"use strict";
        if($('#pieChart').length){
            var pieChart = document.getElementById("pieChart").getContext('2d');

            var pieData = {
                labels: ["Processed", "Pending", "Cancelled","Completed"],
                datasets: [{
                    data: [135, 300,95,225],
                    backgroundColor: [primaryColor, secondaryColor,successColor,dangerColor],
                    hoverBackgroundColor: [primaryColor, secondaryColor,successColor,dangerColor],
                    borderWidth: 0,
                    hoverBorderWidth: 6,
                    hoverBorderColor: [primaryAlphaDot5, secondaryAlphaDot5,successAlphaDot5,dangerAlphaDot5]
                }]
            };

            var pieChartData = new Chart(pieChart, {
                type: 'pie',
                data: pieData,
                options: {
                    legend: {
                        display: false,
                    },
                    animation: {
                        animateScale: true,
                    }
                }
            });
        }


        // Doughnut Chart
		"use strict";
        if($('#doghnutChart').length){
            var doghnutChart = document.getElementById("doghnutChart").getContext('2d');

            var doghnutData = {
                labels: ["Processed", "Pending", "Cancelled","Completed"],
                datasets: [{
                    data: [135, 300,95,225],
                    backgroundColor: [primaryColor, secondaryColor,successColor,dangerColor],
                    hoverBackgroundColor: [primaryColor, secondaryColor,successColor,dangerColor],
                    borderWidth: 0,
                    hoverBorderWidth: 6,
                    hoverBorderColor: [primaryAlphaDot5, secondaryAlphaDot5,successAlphaDot5,dangerAlphaDot5]
                }]
            };

            var doughnutChartData = new Chart(doghnutChart, {
                type: 'doughnut',
                data: doghnutData,
                options: {
                    legend: {
                        display: false
                    },
                    animation: {
                        animateScale: true
                    },
                    cutoutPercentage: 80
                }
            });
        }


    }


    var nWidth =$(window).width();

	"use strict";
    if(nWidth<992){
        $('#navigation').removeClass('open');
        $('#sidebar-panel').removeClass('open');
    }
    else if(nWidth<1096){
        $('#sidebar-panel').removeClass('open');
    }


    /*----------------------------------------
     // - #5  MENU/NAVIGATION
     ----------------------------------------*/
    "use strict";
    $('.menu-items li a').on('click', function(){
        if($(this).next('ul.sub-menu').length !== 0 && !$(this).hasClass('show')){
            $('ul.sub-menu').slideUp(300);
            $('.menu-items li a').removeClass('show');
            $(this).addClass('show');
            $(this).next('ul.sub-menu').slideDown(300);
        }
        else if($(this).hasClass('show')){
            $(this).removeClass('show');
            $(this).next('ul.sub-menu').slideToggle(300);
        }
    });

    // - Toggle Logged User Menu
    $(document).on('click',function(e){
        if ($(e.target).is('.logged-user-menu,.logged-user-menu *')){
        }
        else if($(e.target).is('#show-user-menu, #show-user-menu *')){
            $('.logged-user-menu').toggleClass('show');
        }
        else if($('.logged-user-menu').hasClass('show')){

            $('.logged-user-menu').removeClass('show')
        }
    });

    // - Toggle Sidebar
    $(document).on('click',function(e){
        if ($(e.target).is('#sidebar-panel,#sidebar-panel *')){
        }
        else if($(e.target).is('#toggle-sidebar, #toggle-sidebar *')){
            $('#sidebar-panel').toggleClass('open');
        }
        else if($('#sidebar-panel').hasClass('open') && nWidth<1096){

            $('#sidebar-panel').removeClass('open')
        }
    });


    // - Toggle Navigation
    $(document).on('click',function(e){
        if ($(e.target).is('#navigation,#navigation *')){
        }
        else if($(e.target).is('#toggle-navigation, #toggle-navigation *')){
            $('#navigation').toggleClass('open');
        }
        else if($('#navigation').hasClass('open') && nWidth<992){

            $('#navigation').removeClass('open');
        }
    });



    /*----------------------------------------
     // - #6. FULL BODY COLORED SCROLL
     ----------------------------------------*/

    /*'use strict';
    $('html').niceScroll({
        'smoothscroll': true,
        'scrollspeed': 100,
        'horizrailenabled': false
    });*/


    // - #7. NAVIGATION SCROLL
    $('.custom-scroll').mCustomScrollbar({
        theme:"dark",
        scrollInertia: 300,
        advanced:{
            autoExpandHorizontalScroll:false
        }
    });



    /*----------------------------------------
     // - #8. BOOTSTRAP RELATED JS ACTIVATIONS
     ----------------------------------------*/


    // - Activate Date pickers
    $('input.single-date-picker').daterangepicker({"singleDatePicker": true});
    $('input.date-range-picker').daterangepicker({ "startDate": "03/28/2017", "endDate": "01/10/2017"});

    // - Activate tooltips
    $('[data-toggle="tooltip"]').tooltip({html:true,trigger: 'hover'});

    // - Activate popovers
    $('[data-toggle="popover"]').popover();

    // - Activate Data Tables
    $('[data-table="data-table"]').DataTable({"ordering": false});

    //- Activate Nav pill
    $('#myTab a').on('click',function (e) {
        e.preventDefault();
        $(this).tab('show');
    });


    $('.table-editable').editableTableWidget();

});

