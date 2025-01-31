import ApexCharts from 'apexcharts';


const Options ={
    chart: {

      height: 300,
      type: 'area',
      toolbar: {
        show: false
      },
      zoom: {
        enabled: false
      }
    },
    series: [
      {
        name: 'Visitors',
        data: [180, 51, 60, 38, 88, 50, 40, 52, 88, 80, 60, 70]
      }
    ],
    legend: {
      show: false
    },
    dataLabels: {
      enabled: false
    },
    stroke: {
      curve: 'straight',
      width: 2
    },
    grid: {
      strokeDashArray: 2
    },
    fill: {
      type: 'gradient',

      gradient: {
        type: 'vertical',
        shadeIntensity: 1,
        opacityFrom: 0.1,
        opacityTo: 0.8
      }
    },
    xaxis: {
      type: 'category',
      tickPlacement: 'on',
      categories: [
        '25 January 2023',
        '26 January 2023',
        '27 January 2023',
        '28 January 2023',
        '29 January 2023',
        '30 January 2023',
        '31 January 2023',
        '1 February 2023',
        '2 February 2023',
        '3 February 2023',
        '4 February 2023',
        '5 February 2023'
      ],
      axisBorder: {
        show: false
      },
      axisTicks: {
        show: false
      },
      crosshairs: {
        stroke: {
          dashArray: 0
        },
        dropShadow: {
          show: false
        }
      },
      tooltip: {
        enabled: false
      },
      labels: {
        style: {
          colors: '#9ca3af',
          fontSize: '13px',
          fontFamily: 'Inter, ui-sans-serif',
          fontWeight: 400
        },
        formatter: (title) => {
          let t = title;

          if (t) {
            const newT = t.split(' ');
            t = `${newT[0]} ${newT[1].slice(0, 3)}`;
          }

          return t;
        }
      }
    },
    yaxis: {
      labels: {
        align: 'left',
        minWidth: 0,
        maxWidth: 140,
        style: {
          colors: '#9ca3af',
          fontSize: '13px',
          fontFamily: 'Inter, ui-sans-serif',
          fontWeight: 400
        },
        formatter: (value) => value >= 1000 ? `${value / 1000}k` : value
      }
    },
    tooltip: {
      x: {
        format: 'MMMM yyyy'
      },
      y: {
        formatter: (value) => `${value >= 1000 ? `${value / 1000}k` : value}`
      },
      custom: function (props) {
        const { categories } = props.ctx.opts.xaxis;
        const { dataPointIndex } = props;
        const title = categories[dataPointIndex].split(' ');
        const newTitle = `${title[0]} ${title[1]}`;

        return buildTooltip(props, {
          title: newTitle,
          mode,
          valuePrefix: '',
          hasTextLabel: true,
          markerExtClasses: '!rounded-sm',
          wrapperExtClasses: 'min-w-28'
        });
      }
    },
    responsive: [{
      breakpoint: 568,
      options: {
        chart: {
          height: 300
        },
        labels: {
          style: {
            colors: '#9ca3af',
            fontSize: '11px',
            // use system font

            fontFamily: 'Inter, ui-sans-serif',
            fontWeight: 400
          },
          offsetX: -2,
          formatter: (title) => title.slice(0, 3)
        },
        yaxis: {
          labels: {
            align: 'left',
            minWidth: 0,
            maxWidth: 140,
            style: {
              colors: '#9ca3af',
              fontSize: '11px',
              fontWeight: 400,
              fontFamily: 'Inter, ui-sans-serif'
            },
            formatter: (value) => value >= 1000 ? `${value / 1000}k` : value
          }
        },
      },
    }]
  }

const initChart = async () => {
    const bookingCounts = [
        {
            name: 'Users',
            data: [120, 150, 100, 200, 150]
        }
    ];

    Options.series = bookingCounts;
    // line stroke width
    Options.stroke = {
        curve: 'straight',
        width: 1.5
    }
    var Tripschart = new ApexCharts(document.querySelector('#test'), Options);
    Tripschart.render();
}

await initChart();



// simple ui


document.querySelectorAll('[role="switch"]').forEach((toggle) => {
	toggle.addEventListener("change", () => {
		const isChecked = toggle.checked;
		const thumb = toggle
			.closest(".custom-check-wrapper")
			.querySelector(".custom-check-thumb");
		thumb.style.animation = isChecked
			? "toggleOn 200ms cubic-bezier(0.4, 0, 0.6, 1) forwards"
			: "toggleOff 200ms cubic-bezier(0.4, 0, 0.6, 1) forwards";
	});
});
