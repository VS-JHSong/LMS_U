/*
Template Name: Samply - Admin & Dashboard Template
Author: Pichforest
Website: https://Pichforest.com/
Contact: Pichforest@gmail.com
File: Apex Chart init js
*/

//  line chart datalabel
   
var options = {
    chart: {
      height: 380,
      type: 'line',
      zoom: {
        enabled: false
      },
      toolbar: {
        show: false
      }
    },
    colors: ['#0576b9', '#0ab39c'],
    dataLabels: {
      enabled: true,
    },
    stroke: {
      width: [3, 3],
      curve: 'straight'
    },
    series: [{
      name: "High - 2018",
      data: [26, 24, 32, 36, 33, 26, 33]
    },
    {
      name: "Low - 2018",
      data: [14, 11, 16, 12, 17, 13, 12]
    }
    ],
    grid: {
      row: {
        colors: ['transparent', 'transparent'], // takes an array which will be repeated on columns
        opacity: 0.2
      },
      borderColor: '#f1f1f1'
    },
    markers: {
      style: 'inverted',
      size: 4,
      hover: {
        size: 6
      }
    },
    xaxis: {
      categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul'],
      title: {
        text: 'Month'
      }
    },
    yaxis: {
      title: {
        text: 'Temperature'
      },
      min: 5,
      max: 40
    },
    dataLabels: {
        enabled: false
      },
    legend: {
      position: 'top',
      horizontalAlign: 'right',
      floating: true,
      offsetY: -25,
      offsetX: -5
    },
    responsive: [{
      breakpoint: 600,
      options: {
        chart: {
          toolbar: {
            show: false
          }
        },
        legend: {
          show: false
        },
      }
    }]
  }
  
  var chart = new ApexCharts(
    document.querySelector("#line_chart_datalabel"),
    options
  );
  
  chart.render();


  //  line chart datalabel

  var options = {
    chart: {
      height: 380,
      type: 'line',
      zoom: {
        enabled: false
      },
      toolbar: {
        show: false,
    }
    },
    colors: ['#0576b9', '#f06548', '#0ab39c'],
    dataLabels: {
      enabled: false
    },
    stroke: {
      width: [3, 4, 3],
      curve: 'straight',
      dashArray: [0, 8, 5]
    },
    series: [{
        name: "Session Duration",
        data: [45, 52, 38, 24, 33, 26, 21, 20, 6, 8, 15, 10]
      },
      {
        name: "Page Views",
        data: [36, 42, 60, 42, 13, 18, 29, 37, 36, 51, 32, 35]
      },
      {
        name: 'Total Visits',
        data: [89, 56, 74, 98, 72, 38, 64, 46, 84, 58, 46, 49]
      }
    ],
    markers: {
      size: 0,

      hover: {
        sizeOffset: 6
      }
    },
    xaxis: {
      categories: ['01 Jan', '02 Jan', '03 Jan', '04 Jan', '05 Jan', '06 Jan', '07 Jan', '08 Jan', '09 Jan',
        '10 Jan', '11 Jan', '12 Jan'
      ],
    },
    tooltip: {
      y: [{
        title: {
          formatter: function (val) {
            return val + " (mins)"
          }
        }
      }, {
        title: {
          formatter: function (val) {
            return val + " per session"
          }
        }
      }, {
        title: {
          formatter: function (val) {
            return val;
          }
        }
      }]
    },
    grid: {
      borderColor: '#f1f1f1',
    }
}

var chart = new ApexCharts(
document.querySelector("#line_chart_dashed"),
options
);

  chart.render();

//   spline_area

var options = {
    chart: {
        height: 350,
        type: 'area',
        toolbar: {
            show: false
          }
    },
    dataLabels: {
        enabled: false
    },
    stroke: {
        curve: 'smooth',
        width: 3,
    },
    series: [{
        name: 'series1',
        data: [34, 40, 28, 52, 42, 109, 100]
    }, {
        name: 'series2',
        data: [32, 60, 34, 46, 34, 52, 41]
    }],
    colors: ['#0576b9', '#0ab39c'],
    xaxis: {
        type: 'datetime',
        categories: ["2018-09-19T00:00:00", "2018-09-19T01:30:00", "2018-09-19T02:30:00", "2018-09-19T03:30:00", "2018-09-19T04:30:00", "2018-09-19T05:30:00", "2018-09-19T06:30:00"],                
    },
    grid: {
        borderColor: '#f1f1f1',
    },
    fill: {
        type: 'gradient',
        gradient: {
            shadeIntensity: 1,
            inverseColors: false,
            opacityFrom: 0.45,
            opacityTo: 0.05,
            stops: [20, 100, 100, 100]
          },
      },
    tooltip: {
        x: {
            format: 'dd/MM/yy HH:mm'
        },
    }
}

var chart = new ApexCharts(
    document.querySelector("#spline_area"),
    options
);

chart.render();

// column chart

var options = {
    chart: {
        height: 350,
        type: 'bar',
        toolbar: {
            show: false,
        }
    },
    plotOptions: {
        bar: {
            horizontal: false,
            columnWidth: '50%',
            endingShape: 'rounded'	
        },
    },
    dataLabels: {
        enabled: false
    },
    stroke: {
        show: true,
        width: 2,
        colors: ['transparent']
    },
    series: [{
        name: 'Net Profit',
        data: [46, 57, 59, 54, 62, 58, 64, 60, 66]
    }, {
        name: 'Revenue',
        data: [74, 83, 102, 97, 86, 106, 93, 114, 94]
    }, {
        name: 'Free Cash Flow',
        data: [37, 42, 38, 26, 47, 50, 54, 55, 43]
    }],
    colors: ['#0576b9', '#0ab39c', '#f06548'],
    xaxis: {
        categories: ['Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct'],
    },
    yaxis: {
        title: {
            text: '$ (thousands)'
        }
    },
    grid: {
        borderColor: '#f1f1f1',
    },
    fill: {
        opacity: 1

    },
    tooltip: {
        y: {
            formatter: function (val) {
                return "$ " + val + " thousands"
            }
        }
    }
}

var chart = new ApexCharts(
    document.querySelector("#column_chart"),
    options
);

chart.render();


// column chart with datalabels

var options = {
    chart: {
        height: 350,
        type: 'bar',
        toolbar: {
            show: false,
        }
    },
    plotOptions: {
        bar: {
            columnWidth: '34%',
            dataLabels: {
                position: 'top', // top, center, bottom
            },
        }
    },
    dataLabels: {
        enabled: true,
        formatter: function (val) {
            return val + "%";
        },
        offsetY: -20,
        style: {
            fontSize: '12px',
            colors: ["#304758"]
        }
    },
    series: [{
        name: 'Inflation',
        data: [2.5, 3.2, 5.0, 10.1, 4.2, 3.8, 3, 2.4, 4.0, 1.2, 3.5, 0.8]
    }],
    colors: ['#0576b9'],
    grid: {
        borderColor: '#f1f1f1',
    },
    xaxis: {
        categories: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
        position: 'top',
        labels: {
            offsetY: -18,

        },
        axisBorder: {
            show: false
        },
        axisTicks: {
            show: false
        },
        crosshairs: {
            fill: {
                type: 'gradient',
                gradient: {
                    colorFrom: '#D8E3F0',
                    colorTo: '#BED1E6',
                    stops: [0, 100],
                    opacityFrom: 0.4,
                    opacityTo: 0.5,
                }
            }
        },
        tooltip: {
            enabled: true,
            offsetY: -35,

        }
    },
    fill: {
        gradient: {
            shade: 'light',
            type: "horizontal",
            shadeIntensity: 0.25,
            gradientToColors: undefined,
            inverseColors: true,
            opacityFrom: 1,
            opacityTo: 1,
            stops: [50, 0, 100, 100]
        },
    },
    yaxis: {
        axisBorder: {
            show: false
        },
        axisTicks: {
            show: false,
        },
        labels: {
            show: false,
            formatter: function (val) {
                return val + "%";
            }
        }

    },
    title: {
        text: 'Monthly Inflation in Argentina, 2002',
        floating: true,
        offsetY: 320,
        align: 'center',
        style: {
            color: '#444'
        }
    },
}

var chart = new ApexCharts(
    document.querySelector("#column_chart_datalabel"),
    options
);

chart.render();



// Bar chart

var options = {
    chart: {
        height: 350,
        type: 'bar',
        toolbar: {
            show: false,
        }
    },
    plotOptions: {
        bar: {
            horizontal: true,
            barHeight: '50%',
        }
    },
    dataLabels: {
        enabled: false
    },
    series: [{
        data: [380, 430, 450, 475, 550, 584, 780, 1100, 1220, 1365]
    }],
    colors: ['#0ab39c'],
    grid: {
        borderColor: '#f1f1f1',
    },
    xaxis: {
        categories: ['South Korea', 'Canada', 'United Kingdom', 'Netherlands', 'Italy', 'France', 'Japan', 'United States', 'China', 'Germany'],
    }
}

var chart = new ApexCharts(
    document.querySelector("#bar_chart"),
    options
);

chart.render();


// Mixed chart

var options = {
    chart: {
        height: 350,
        type: 'line',
        stacked: false,
        toolbar: {
            show: false
        }
    },
    stroke: {
        width: [0, 2, 4],
        curve: 'smooth'
    },
    plotOptions: {
        bar: {
            columnWidth: '34%'
        }
    },
    colors: ['#0576b9', '#0ab39c', '#f06548'],
    series: [{
        name: 'Team A',
        type: 'column',
        data: [23, 11, 22, 27, 13, 22, 37, 21, 44, 22, 30]
    }, {
        name: 'Team B',
        type: 'area',
        data: [44, 55, 41, 67, 22, 43, 21, 41, 56, 27, 43]
    }, {
        name: 'Team C',
        type: 'line',
        data: [30, 25, 36, 30, 45, 35, 64, 52, 59, 36, 39]
    }],
    fill: {
        opacity: [0.85, 0.25, 1],
        gradient: {
            inverseColors: false,
            shade: 'light',
            type: "vertical",
            opacityFrom: 0.85,
            opacityTo: 0.55,
            stops: [0, 100, 100, 100]
        }
    },
    labels: ['01/01/2003', '02/01/2003', '03/01/2003', '04/01/2003', '05/01/2003', '06/01/2003', '07/01/2003', '08/01/2003', '09/01/2003', '10/01/2003', '11/01/2003'],
    markers: {
        size: 0
    },
    xaxis: {
        type: 'datetime'
    },
    yaxis: {
        title: {
            text: 'Points',
        },
    },
    tooltip: {
        shared: true,
        intersect: false,
        y: {
            formatter: function (y) {
                if (typeof y !== "undefined") {
                    return y.toFixed(0) + " points";
                }
                return y;
  
            }
        }
    },
    grid: {
        borderColor: '#f1f1f1'
    }
  }
  
  var chart = new ApexCharts(
    document.querySelector("#mixed_chart"),
    options
  );

  chart.render();


// Timeline chart

var options = {
    series: [
    {
      data: [
        {
          x: 'Code',
          y: [
            new Date('2019-03-02').getTime(),
            new Date('2019-03-04').getTime()
          ]
        },
        {
          x: 'Test',
          y: [
            new Date('2019-03-04').getTime(),
            new Date('2019-03-08').getTime()
          ]
        },
        {
          x: 'Validation',
          y: [
            new Date('2019-03-08').getTime(),
            new Date('2019-03-12').getTime()
          ]
        },
        {
          x: 'Deployment',
          y: [
            new Date('2019-03-12').getTime(),
            new Date('2019-03-18').getTime()
          ]
        }
      ]
    }
  ],
    chart: {
    height: 350,
    type: 'rangeBar',
    toolbar: {
        show: false
    }
  },
  plotOptions: {
    bar: {
      horizontal: true,
      barHeight: '24%',
    }
  },
  colors: ['#0576b9'],
  xaxis: {
    type: 'datetime'
  }
};

var chart = new ApexCharts(document.querySelector("#timeline-chart"), options);
chart.render();



// Timeline Distributed chart

var options = {
  series: [
  {
    name: 'Bob',
    data: [
      {
        x: 'Design',
        y: [
          new Date('2019-03-05').getTime(),
          new Date('2019-03-08').getTime()
        ]
      },
      {
        x: 'Code',
        y: [
          new Date('2019-03-02').getTime(),
          new Date('2019-03-05').getTime()
        ]
      },
      {
        x: 'Code',
        y: [
          new Date('2019-03-05').getTime(),
          new Date('2019-03-07').getTime()
        ]
      },
      {
        x: 'Test',
        y: [
          new Date('2019-03-03').getTime(),
          new Date('2019-03-09').getTime()
        ]
      },
      {
        x: 'Test',
        y: [
          new Date('2019-03-08').getTime(),
          new Date('2019-03-11').getTime()
        ]
      },
      {
        x: 'Validation',
        y: [
          new Date('2019-03-11').getTime(),
          new Date('2019-03-16').getTime()
        ]
      },
      {
        x: 'Design',
        y: [
          new Date('2019-03-01').getTime(),
          new Date('2019-03-03').getTime()
        ]
      }
    ]
  },
  {
    name: 'Joe',
    data: [
      {
        x: 'Design',
        y: [
          new Date('2019-03-02').getTime(),
          new Date('2019-03-05').getTime()
        ]
      },
      {
        x: 'Test',
        y: [
          new Date('2019-03-06').getTime(),
          new Date('2019-03-16').getTime()
        ]
      },
      {
        x: 'Code',
        y: [
          new Date('2019-03-03').getTime(),
          new Date('2019-03-07').getTime()
        ]
      },
      {
        x: 'Deployment',
        y: [
          new Date('2019-03-20').getTime(),
          new Date('2019-03-22').getTime()
        ]
      },
      {
        x: 'Design',
        y: [
          new Date('2019-03-10').getTime(),
          new Date('2019-03-16').getTime()
        ]
      }
    ]
  },
  {
    name: 'Dan',
    data: [
      {
        x: 'Code',
        y: [
          new Date('2019-03-10').getTime(),
          new Date('2019-03-17').getTime()
        ]
      },
      {
        x: 'Validation',
        y: [
          new Date('2019-03-05').getTime(),
          new Date('2019-03-09').getTime()
        ]
      },
    ]
  }
],
  chart: {
  height: 350,
  type: 'rangeBar',
  toolbar: {
    show: false
}
},
plotOptions: {
  bar: {
    horizontal: true,
    barHeight: '80%'
  }
},
xaxis: {
  type: 'datetime'
},
stroke: {
  width: 1
},
fill: {
  type: 'solid',
  opacity: 0.8,
  colors: ['#0576b9', '#0ab39c', '#f06548'],
},  
legend: {
  position: 'top',
  horizontalAlign: 'center'
}
};

  var chart = new ApexCharts(document.querySelector("#timelinedistributed-chart"), options);
  chart.render();


// CandleStick  chart

var options = {
    series: [{
    data: [{
        x: new Date(1538778600000),
        y: [6629.81, 6650.5, 6623.04, 6633.33]
      },
      {
        x: new Date(1538780400000),
        y: [6632.01, 6643.59, 6620, 6630.11]
      },
      {
        x: new Date(1538782200000),
        y: [6630.71, 6648.95, 6623.34, 6635.65]
      },
      {
        x: new Date(1538784000000),
        y: [6635.65, 6651, 6629.67, 6638.24]
      },
      {
        x: new Date(1538785800000),
        y: [6638.24, 6640, 6620, 6624.47]
      },
      {
        x: new Date(1538787600000),
        y: [6624.53, 6636.03, 6621.68, 6624.31]
      },
      {
        x: new Date(1538789400000),
        y: [6624.61, 6632.2, 6617, 6626.02]
      },
      {
        x: new Date(1538791200000),
        y: [6627, 6627.62, 6584.22, 6603.02]
      },
      {
        x: new Date(1538793000000),
        y: [6605, 6608.03, 6598.95, 6604.01]
      },
      {
        x: new Date(1538794800000),
        y: [6604.5, 6614.4, 6602.26, 6608.02]
      },
      {
        x: new Date(1538796600000),
        y: [6608.02, 6610.68, 6601.99, 6608.91]
      },
      {
        x: new Date(1538798400000),
        y: [6608.91, 6618.99, 6608.01, 6612]
      },
      {
        x: new Date(1538800200000),
        y: [6612, 6615.13, 6605.09, 6612]
      },
      {
        x: new Date(1538802000000),
        y: [6612, 6624.12, 6608.43, 6622.95]
      },
      {
        x: new Date(1538803800000),
        y: [6623.91, 6623.91, 6615, 6615.67]
      },
      {
        x: new Date(1538805600000),
        y: [6618.69, 6618.74, 6610, 6610.4]
      },
      {
        x: new Date(1538807400000),
        y: [6611, 6622.78, 6610.4, 6614.9]
      },
      {
        x: new Date(1538809200000),
        y: [6614.9, 6626.2, 6613.33, 6623.45]
      },
      {
        x: new Date(1538811000000),
        y: [6623.48, 6627, 6618.38, 6620.35]
      },
      {
        x: new Date(1538812800000),
        y: [6619.43, 6620.35, 6610.05, 6615.53]
      },
      {
        x: new Date(1538814600000),
        y: [6615.53, 6617.93, 6610, 6615.19]
      },
      {
        x: new Date(1538816400000),
        y: [6615.19, 6621.6, 6608.2, 6620]
      },
      {
        x: new Date(1538818200000),
        y: [6619.54, 6625.17, 6614.15, 6620]
      },
      {
        x: new Date(1538820000000),
        y: [6620.33, 6634.15, 6617.24, 6624.61]
      },
      {
        x: new Date(1538821800000),
        y: [6625.95, 6626, 6611.66, 6617.58]
      },
      {
        x: new Date(1538823600000),
        y: [6619, 6625.97, 6595.27, 6598.86]
      },
      {
        x: new Date(1538825400000),
        y: [6598.86, 6598.88, 6570, 6587.16]
      },
      {
        x: new Date(1538827200000),
        y: [6588.86, 6600, 6580, 6593.4]
      },
      {
        x: new Date(1538829000000),
        y: [6593.99, 6598.89, 6585, 6587.81]
      },
      {
        x: new Date(1538830800000),
        y: [6587.81, 6592.73, 6567.14, 6578]
      },
      {
        x: new Date(1538832600000),
        y: [6578.35, 6581.72, 6567.39, 6579]
      },
      {
        x: new Date(1538834400000),
        y: [6579.38, 6580.92, 6566.77, 6575.96]
      },
      {
        x: new Date(1538836200000),
        y: [6575.96, 6589, 6571.77, 6588.92]
      },
      {
        x: new Date(1538838000000),
        y: [6588.92, 6594, 6577.55, 6589.22]
      },
      {
        x: new Date(1538839800000),
        y: [6589.3, 6598.89, 6589.1, 6596.08]
      },
      {
        x: new Date(1538841600000),
        y: [6597.5, 6600, 6588.39, 6596.25]
      },
      {
        x: new Date(1538843400000),
        y: [6598.03, 6600, 6588.73, 6595.97]
      },
      {
        x: new Date(1538845200000),
        y: [6595.97, 6602.01, 6588.17, 6602]
      },
      {
        x: new Date(1538847000000),
        y: [6602, 6607, 6596.51, 6599.95]
      },
      {
        x: new Date(1538848800000),
        y: [6600.63, 6601.21, 6590.39, 6591.02]
      },
      {
        x: new Date(1538850600000),
        y: [6591.02, 6603.08, 6591, 6591]
      },
      {
        x: new Date(1538852400000),
        y: [6591, 6601.32, 6585, 6592]
      },
      {
        x: new Date(1538854200000),
        y: [6593.13, 6596.01, 6590, 6593.34]
      },
      {
        x: new Date(1538856000000),
        y: [6593.34, 6604.76, 6582.63, 6593.86]
      },
      {
        x: new Date(1538857800000),
        y: [6593.86, 6604.28, 6586.57, 6600.01]
      },
      {
        x: new Date(1538859600000),
        y: [6601.81, 6603.21, 6592.78, 6596.25]
      },
      {
        x: new Date(1538861400000),
        y: [6596.25, 6604.2, 6590, 6602.99]
      },
      {
        x: new Date(1538863200000),
        y: [6602.99, 6606, 6584.99, 6587.81]
      },
      {
        x: new Date(1538865000000),
        y: [6587.81, 6595, 6583.27, 6591.96]
      },
      {
        x: new Date(1538866800000),
        y: [6591.97, 6596.07, 6585, 6588.39]
      },
      {
        x: new Date(1538868600000),
        y: [6587.6, 6598.21, 6587.6, 6594.27]
      },
      {
        x: new Date(1538870400000),
        y: [6596.44, 6601, 6590, 6596.55]
      },
      {
        x: new Date(1538872200000),
        y: [6598.91, 6605, 6596.61, 6600.02]
      },
      {
        x: new Date(1538874000000),
        y: [6600.55, 6605, 6589.14, 6593.01]
      },
      {
        x: new Date(1538875800000),
        y: [6593.15, 6605, 6592, 6603.06]
      },
      {
        x: new Date(1538877600000),
        y: [6603.07, 6604.5, 6599.09, 6603.89]
      },
      {
        x: new Date(1538879400000),
        y: [6604.44, 6604.44, 6600, 6603.5]
      },
      {
        x: new Date(1538881200000),
        y: [6603.5, 6603.99, 6597.5, 6603.86]
      },
      {
        x: new Date(1538883000000),
        y: [6603.85, 6605, 6600, 6604.07]
      },
      {
        x: new Date(1538884800000),
        y: [6604.98, 6606, 6604.07, 6606]
      },
    ]
  }],
    chart: {
    type: 'candlestick',
    height: 350,
    toolbar: {
        show: false
    }
  },
  plotOptions: {
    candlestick: {
        colors: {
            upward: '#0576b9',
            downward: '#f06548'
        }
    }
},
  xaxis: {
    type: 'datetime'
  },
  yaxis: {
    tooltip: {
      enabled: true
    }
  }
  };

  var chart = new ApexCharts(document.querySelector("#candlestick-chart"), options);
  chart.render();

  
// Bubble chart

var options = {
    series: [{
    name: 'Bubble1',
    data: generatebubbleData(new Date('11 Feb 2017 GMT').getTime(), 20, {
      min: 10,
      max: 60
    })
  },
  {
    name: 'Bubble2',
    data: generatebubbleData(new Date('11 Feb 2017 GMT').getTime(), 20, {
      min: 10,
      max: 60
    })
  },
  {
    name: 'Bubble3',
    data: generatebubbleData(new Date('11 Feb 2017 GMT').getTime(), 20, {
      min: 10,
      max: 60
    })
  },
  {
    name: 'Bubble4',
    data: generatebubbleData(new Date('11 Feb 2017 GMT').getTime(), 20, {
      min: 10,
      max: 60
    })
  }],
    chart: {
      height: 350,
      type: 'bubble',
      toolbar: {
        show: false
    }
  },
  dataLabels: {
      enabled: false
  },
  colors: ['#0576b9', '#0ab39c', '#f7b84b', '#f06548'],
  fill: {
      opacity: 0.8
  },
  xaxis: {
      tickAmount: 12,
      type: 'category',
  },
  yaxis: {
      max: 70
  }
};

var chart = new ApexCharts(document.querySelector("#bubble-chart"), options);
chart.render();

// bubble chart data

function generatebubbleData(baseval, count, yrange) {
  var i = 0;
  var series = [];
  while (i < count) {
    var x = Math.floor(Math.random() * (750 - 1 + 1)) + 1;;
    var y = Math.floor(Math.random() * (yrange.max - yrange.min + 1)) + yrange.min;
    var z = Math.floor(Math.random() * (75 - 15 + 1)) + 15;

    series.push([x, y, z]);
    baseval += 86400000;
    i++;
  }
  return series;
}


// scatter chart

var options = {
    series: [{
    name: "SAMPLE A",
    data: [
    [16.4, 5.4], [21.7, 2], [25.4, 3], [19, 2], [10.9, 1], [13.6, 3.2], [10.9, 7.4], [10.9, 0], [10.9, 8.2], [16.4, 0], [16.4, 1.8], [13.6, 0.3], [13.6, 0], [29.9, 0], [27.1, 2.3], [16.4, 0], [13.6, 3.7], [10.9, 5.2], [16.4, 6.5], [10.9, 0], [24.5, 7.1], [10.9, 0], [8.1, 4.7], [19, 0], [21.7, 1.8], [27.1, 0], [24.5, 0], [27.1, 0], [29.9, 1.5], [27.1, 0.8], [22.1, 2]]
  },{
    name: "SAMPLE B",
    data: [
    [36.4, 13.4], [1.7, 11], [5.4, 8], [9, 17], [1.9, 4], [3.6, 12.2], [1.9, 14.4], [1.9, 9], [1.9, 13.2], [1.4, 7], [6.4, 8.8], [3.6, 4.3], [1.6, 10], [9.9, 2], [7.1, 15], [1.4, 0], [3.6, 13.7], [1.9, 15.2], [6.4, 16.5], [0.9, 10], [4.5, 17.1], [10.9, 10], [0.1, 14.7], [9, 10], [12.7, 11.8], [2.1, 10], [2.5, 10], [27.1, 10], [2.9, 11.5], [7.1, 10.8], [2.1, 12]]
  },{
    name: "SAMPLE C",
    data: [
    [21.7, 3], [23.6, 3.5], [24.6, 3], [29.9, 3], [21.7, 20], [23, 2], [10.9, 3], [28, 4], [27.1, 0.3], [16.4, 4], [13.6, 0], [19, 5], [22.4, 3], [24.5, 3], [32.6, 3], [27.1, 4], [29.6, 6], [31.6, 8], [21.6, 5], [20.9, 4], [22.4, 0], [32.6, 10.3], [29.7, 20.8], [24.5, 0.8], [21.4, 0], [21.7, 6.9], [28.6, 7.7], [15.4, 0], [18.1, 0], [33.4, 0], [16.4, 0]]
  }],
    chart: {
    height: 350,
    type: 'scatter',
    toolbar: {
        show: false
    },
    zoom: {
      enabled: true,
      type: 'xy'
    }
  },
  xaxis: {
    tickAmount: 10,
    labels: {
      formatter: function(val) {
        return parseFloat(val).toFixed(1)
      }
    }
  },
  yaxis: {
    tickAmount: 7
  },
  colors: ['#0576b9', '#0ab39c', '#f7b84b'],
};

var chart = new ApexCharts(document.querySelector("#scatter-chart"), options);
chart.render();


// heatmap chart

var options = {
    series: [{
    name: 'Metric1',
    data: generateData(18, {
      min: 0,
      max: 90
    })
  },
  {
    name: 'Metric2',
    data: generateData(18, {
      min: 0,
      max: 90
    })
  },
  {
    name: 'Metric3',
    data: generateData(18, {
      min: 0,
      max: 90
    })
  },
  {
    name: 'Metric4',
    data: generateData(18, {
      min: 0,
      max: 90
    })
  },
  {
    name: 'Metric5',
    data: generateData(18, {
      min: 0,
      max: 90
    })
  },
  {
    name: 'Metric6',
    data: generateData(18, {
      min: 0,
      max: 90
    })
  },
  {
    name: 'Metric7',
    data: generateData(18, {
      min: 0,
      max: 90
    })
  },
  {
    name: 'Metric8',
    data: generateData(18, {
      min: 0,
      max: 90
    })
  },
  {
    name: 'Metric9',
    data: generateData(18, {
      min: 0,
      max: 90
    })
  }
  ],
    chart: {
    height: 350,
    type: 'heatmap',
    toolbar: {
      show: false,
  }
  },
  dataLabels: {
    enabled: false
  },
  colors: ["#0576b9"],
  };

  var chart = new ApexCharts(document.querySelector("#heatmap-chart"), options);
  chart.render();

  function generateData(count, yrange) {
    var i = 0;
    var series = [];
    while (i < count) {
      var x = 'w' + (i + 1).toString();
      var y = Math.floor(Math.random() * (yrange.max - yrange.min + 1)) + yrange.min;
  
      series.push({
        x: x,
        y: y
      });
      i++;
    }
    return series;
  }

// treemap chart

var options = {
    series: [
    {
      name: 'Desktops',
      data: [
        {
          x: 'ABC',
          y: 10
        },
        {
          x: 'DEF',
          y: 60
        },
        {
          x: 'XYZ',
          y: 41
        }
      ]
    },
    {
      name: 'Mobile',
      data: [
        {
          x: 'ABCD',
          y: 10
        },
        {
          x: 'DEFG',
          y: 20
        },
        {
          x: 'WXYZ',
          y: 51
        },
        {
          x: 'PQR',
          y: 30
        },
        {
          x: 'MNO',
          y: 20
        },
        {
          x: 'CDE',
          y: 30
        }
      ]
    }
  ],
    legend: {
    show: false
  },
  chart: {
    height: 350,
    type: 'treemap',
    toolbar: {
        show: false
    },
  },
  colors: ['#0576b9', '#0ab39c'],
  };

  var chart = new ApexCharts(document.querySelector("#treemap-chart"), options);
  chart.render();





// pie chart

var options = {
  chart: {
      height: 320,
      type: 'pie',

  }, 
  series: [44, 55, 41, 17, 15],
  labels: ["Series 1", "Series 2", "Series 3", "Series 4", "Series 5"],
  colors: ["#0ab39c", "#0576b9","#f06548", "#299cdb", "#f7b84b"],
  legend: {
      show: true,
      position: 'bottom',
      horizontalAlign: 'center',
      verticalAlign: 'middle',
      floating: false,
      fontSize: '14px',
      offsetX: 0,
      offsetY: -10
  },
  responsive: [{
      breakpoint: 600,
      options: {
          chart: {
              height: 240
          },
          legend: {
              show: false
          },
      }
  }]

}

var chart = new ApexCharts(
  document.querySelector("#pie-chart"),
  options
);

chart.render();


// Donut chart

var options = {
  chart: {
      height: 320,
      type: 'donut',
  }, 
  series: [44, 55, 41, 17, 15],
  labels: ["Series 1", "Series 2", "Series 3", "Series 4", "Series 5"],
  colors: ["#0ab39c", "#0576b9","#f06548", "#299cdb", "#f7b84b"],
  legend: {
      show: true,
      position: 'bottom',
      horizontalAlign: 'center',
      verticalAlign: 'middle',
      floating: false,
      fontSize: '14px',
      offsetX: 0,
      offsetY: -10
  },
  responsive: [{
      breakpoint: 600,
      options: {
          chart: {
              height: 240
          },
          legend: {
              show: false
          },
      }
  }]
}

var chart = new ApexCharts(
  document.querySelector("#donut-chart"),
  options
);

chart.render();

//  Radial chart
var options = {
  chart: {
      height: 350,
      type: 'radialBar',
  },
  plotOptions: {
      radialBar: {
          dataLabels: {
              name: {
                  fontSize: '22px',
              },
              value: {
                  fontSize: '16px',
              },
              total: {
                  show: true,
                  label: 'Total',
                  formatter: function (w) {
                      // By default this function returns the average of all series. The below is just an example to show the use of custom formatter function
                      return 249
                  }
              }
          }
      }
  },
  series: [44, 55, 67, 83],
  labels: ['Computer', 'Tablet', 'Laptop', 'Mobile'],
  colors: ['#0576b9', '#0ab39c', '#f06548', '#f7b84b'],
}

var chart = new ApexCharts(
  document.querySelector("#radial-chart"),
  options
);

chart.render();


//  Radial custom angle chart

var options = {
  series: [76, 67, 61, 90],
  chart: {
  height: 350,
  type: 'radialBar',
},
plotOptions: {
  radialBar: {
    offsetY: 0,
    startAngle: 0,
    endAngle: 270,
    hollow: {
      margin: 5,
      size: '45%',
      background: 'transparent',
      image: undefined,
    },
    dataLabels: {
      name: {
        show: false,
      },
      value: {
        show: false,
      }
    }
  }
},
colors: ['#0ab39c', '#299cdb', '#0576b9', '#0077B5'],
labels: ['Vimeo', 'Messenger', 'Facebook', 'LinkedIn'],
legend: {
  show: true,
  floating: true,
  fontSize: '16px',
  position: 'left',
  offsetX: 160,
  offsetY: 15,
  labels: {
    useSeriesColors: true,
  },
  markers: {
    size: 0
  },
  formatter: function(seriesName, opts) {
    return seriesName + ":  " + opts.w.globals.series[opts.seriesIndex]
  },
  itemMargin: {
    vertical: 3
  }
},
responsive: [{
  breakpoint: 480,
  options: {
    legend: {
        show: false
    }
  }
}]
};

var chart = new ApexCharts(document.querySelector("#radial-angle-chart"), options);
chart.render();


// radar chart

var options = {
  series: [{
  name: 'Series 1',
  data: [80, 50, 30, 40, 100, 20],
}],
  chart: {
  height: 350,
  type: 'radar',
  toolbar: {
    show: false
},
},
colors: ['#0576b9'],
xaxis: {
  categories: ['January', 'February', 'March', 'April', 'May', 'June']
}
};

var chart = new ApexCharts(document.querySelector("#radar-chart"), options);
chart.render();


// radar multiple chart

var options = {
    series: [{
    name: 'Series 1',
    data: [80, 50, 30, 40, 100, 20],
  }, {
    name: 'Series 2',
    data: [20, 30, 40, 80, 20, 80],
  }, {
    name: 'Series 3',
    data: [44, 76, 78, 13, 43, 10],
  }],
    chart: {
    height: 350,
    type: 'radar',
    toolbar: {
        show: false
    },
    dropShadow: {
      enabled: true,
      blur: 1,
      left: 1,
      top: 1
    }
  },
  colors: ['#0576b9', '#0ab39c', '#f7b84b'],
  stroke: {
    width: 0
  },
  fill: {
    opacity: 0.4
  },
  markers: {
    size: 0
  },
  xaxis: {
    categories: ['2011', '2012', '2013', '2014', '2015', '2016']
  }
};

var chart = new ApexCharts(document.querySelector("#radar-multiple-chart"), options);
chart.render();


// polar area

var options = {
  series: [14, 23, 21, 17, 15, 10, 12, 17, 21],
  chart: {
  type: 'polarArea',
  height: 350,
},
stroke: {
  colors: ['#fff']
},
fill: {
  opacity: 0.8
},
colors: ['#0576b9', '#0ab39c', '#299cdb', '#f7b84b', '#f06548', '#323a46', '#f672a7', '#6559cc', '#74788d'],
responsive: [{
  breakpoint: 480,
  options: {
    chart: {
      width: 200
    },
    legend: {
      position: 'bottom'
    }
  }
}]
};

var chart = new ApexCharts(document.querySelector("#polararea-chart"), options);
chart.render();

// polar area monochrome

var options = {
  series: [42, 47, 52, 58, 65],
  chart: {
  height: 380,
  type: 'polarArea'
},
labels: ['Rose A', 'Rose B', 'Rose C', 'Rose D', 'Rose E'],
fill: {
  opacity: 1
},
stroke: {
  width: 1,
  colors: undefined
},
yaxis: {
  show: false
},
legend: {
  position: 'bottom'
},
plotOptions: {
  polarArea: {
    rings: {
      strokeWidth: 0
    },

  }
},
theme: {
  monochrome: {
    enabled: true,
    color: '#299cdb',
    shadeTo: 'light',
    shadeIntensity: 0.6
  }
}
};

var chart = new ApexCharts(document.querySelector("#polararea-monochrome-chart"), options);
chart.render();