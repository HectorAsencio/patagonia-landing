@extends('layout') @section('content')

<!--
<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>-->
<!------ Include the above in your HEAD tag ---------->

<link
    href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
    rel="stylesheet"
/>

<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/highcharts-more.js"></script>

<!--
<script src="https://code.highcharts.com/modules/exporting.js"></script>
-->
<style>
    .grafico {
        min-width: 310px;
        max-width: 400px;
        height: 280px;
        margin: 0 auto;
    }

    .main-header {
        font-size: x-large;
        color: #888;
        font-family: Verdana;
        margin-bottom: 20px;
    }

    .destaque {
        color: #f88;
        font-weight: bolder;
    }

    .highcharts-tooltip h3 {
        margin: 0.3em 0;
    }
</style>

<div class="container">
    <div class="row">
        <br />
        <div class="col text-center">
            <h2>Dashboard</h2>
        </div>
    </div>
    <div class="row">
        <div class="main-header">Notificaciones</div>
    </div>
    <div class="row text-center">
        <div class="col">
            <div class="counter">
                <i class="fa fa-bell fa-2x" aria-hidden="true"></i>
                <h2
                    class="timer count-title count-number"
                    data-to="{{ $nNotificaciones }}"
                    data-speed="1500"
                ></h2>
                <p class="count-text">Notificaciones</p>
            </div>
        </div>
        <div class="col">
            <div class="counter">
                <i class="fa fa-check-circle-o fa-2x"></i>
                <h2
                    class="timer count-title count-number"
                    data-to="{{ $aNotificaciones }}"
                    data-speed="1500"
                ></h2>
                <p class="count-text">Aprobadas</p>
            </div>
        </div>
        <div class="col">
            <div class="counter">
                <i class="fa fa-times-circle fa-2x" aria-hidden="true"></i>
                <h2
                    class="timer count-title count-number"
                    data-to="{{ $rNotificaciones }}"
                    data-speed="1500"
                ></h2>
                <p class="count-text">Rechazadas</p>
            </div>
        </div>
        <div class="col">
            <div class="counter">
                <i class="fa fa-clock-o fa-2x" aria-hidden="true"></i>
                <h2
                    class="timer count-title count-number"
                    data-to="{{ $pNotificaciones }}"
                    data-speed="1500"
                ></h2>
                <p class="count-text">Pendientes</p>
            </div>
        </div>
    </div>
</div>
<br><br>
<div class="container">
    <div class="row">
        <div class="main-header">Usuarios</div>
    </div>
    <div class="row text-center">
        <div class="col">
            <div class="counter">
                <i class="fa fa-users fa-2x" aria-hidden="true"></i>
                <h2
                    class="timer count-title count-number"
                    data-to="{{ $nUsuarios }}"
                    data-speed="1500"
                ></h2>
                <p class="count-text">Usuarios</p>
            </div>
        </div>
        <div class="col">
            <div class="counter">
                <i class="fa fa-user-plus fa-2x" aria-hidden="true"></i>
                <h2
                    class="timer count-title count-number"
                    data-to="{{ $dUsuarios }}"
                    data-speed="1500"
                ></h2>
                <p class="count-text">Directores</p>
            </div>
        </div>
        <div class="col">
            <div class="counter">
                <i class="fa fa-user-circle-o fa-2x" aria-hidden="true"></i>
                <h2
                    class="timer count-title count-number"
                    data-to="{{ $sUsuarios }}"
                    data-speed="1500"
                ></h2>
                <p class="count-text">Supervisores</p>
            </div>
        </div>
        <div class="col">
            <div class="counter">
                <i class="fa fa-exclamation-circle fa-2x" aria-hidden="true"></i>
                <h2
                    class="timer count-title count-number"
                    data-to="{{ $nNotiUsuarios }}"
                    data-speed="1500"
                ></h2>
                <p class="count-text">Promedio Notificaciones X Usuario</p>
            </div>
        </div>
    </div>

	<br>
	<hr>
	<br>

    <div class="row">
        <div class="col-lg-6">
			<canvas id="campanas" width="600" height="400"></canvas>
		</div>
        <div class="col-lg-6">
			<canvas id="polar" width="600" height="400"></canvas>
		</div>
    </div>

</div>
<br><br>
<div class="container">
    <div class="row">
        <div class="main-header">Graficas</div>
    </div>

   

<canvas id="densityChart" width="600" height="300"></canvas>



<script>
var densityCanvas = document.getElementById("densityChart");

Chart.defaults.global.defaultFontFamily = "Lato";
Chart.defaults.global.defaultFontSize = 18;

var densityData = {
  label: 'Notificaciones por meses de año',
  data: ["{{$listadoMeses[0]}}","{{$listadoMeses[1]}}", "{{$listadoMeses[2]}}","{{$listadoMeses[3]}}","{{$listadoMeses[4]}}", "{{$listadoMeses[5]}}","{{$listadoMeses[6]}}","{{$listadoMeses[7]}}", "{{$listadoMeses[8]}}","{{$listadoMeses[9]}}","{{$listadoMeses[10]}}", "{{$listadoMeses[11]}}"],
  backgroundColor: [
    'rgba(0, 99, 132, 0.6)',
	'rgba(15, 99, 132, 0.6)',
    'rgba(30, 99, 132, 0.6)',
	'rgba(45, 99, 132, 0.6)',
    'rgba(60, 99, 132, 0.6)',
	'rgba(75, 99, 132, 0.6)',
    'rgba(90, 99, 132, 0.6)',
	'rgba(105, 99, 132, 0.6)',
    'rgba(120, 99, 132, 0.6)',
    'rgba(150, 99, 132, 0.6)',
    'rgba(180, 99, 132, 0.6)',
    'rgba(210, 99, 132, 0.6)',
    'rgba(240, 99, 132, 0.6)',
  ],
  borderColor: [
    'rgba(0, 99, 132, 0.6)',
	'rgba(15, 99, 132, 0.6)',
    'rgba(30, 99, 132, 0.6)',
	'rgba(45, 99, 132, 0.6)',
    'rgba(60, 99, 132, 0.6)',
	'rgba(75, 99, 132, 0.6)',
    'rgba(90, 99, 132, 0.6)',
	'rgba(105, 99, 132, 0.6)',
    'rgba(120, 99, 132, 0.6)',
    'rgba(150, 99, 132, 0.6)',
    'rgba(180, 99, 132, 0.6)',
    'rgba(210, 99, 132, 0.6)',
    'rgba(240, 99, 132, 0.6)',
  ],
  borderWidth: 2,
  hoverBorderWidth: 0
};

var chartOptions = {
  scales: {
    yAxes: [{
      barPercentage: 0.5
    }]
  },
  elements: {
    rectangle: {
      borderSkipped: 'left',
    }
  }
};

var barChart = new Chart(densityCanvas, {
  type: 'bar',
  data: {
    labels: ["Enero", "Febrero", "Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre", "Octubre", "Noviembre", "Diciembre"],
    datasets: [densityData],
  },
  options: chartOptions
});
    </script>

<br>
<hr>
<br>

<script>

const data = {
  labels: [
    'Rechazadas',
    'Aprobadas',
    'Pendientes'
  ],
  datasets: [{
    label: 'Notificaciones',
    data: ["{{ $rNotificaciones }}", "{{ $aNotificaciones }}", "{{ $pNotificaciones }}"],
    backgroundColor: [
      'rgb(255, 99, 132)',
      'rgb(54, 162, 235)',
      'rgb(255, 205, 86)'
    ],
    hoverOffset: 4
  }]
};
        chartBarCampanas = new Chart(document.getElementById('campanas'), {
          type: 'doughnut',
          data: data,
        });
</script>

<script>
const data2 = {
  labels: [
    'Total usuarios',
    'Total directores',
    'Total supervisores'
  ],
  datasets: [{
    label: 'Usuarios',
    data: ["{{ $nUsuarios }}", "{{ $dUsuarios }}", "{{ $sUsuarios }}"],
    backgroundColor: [
      'rgb(255, 99, 132)',
      'rgb(75, 192, 192)',
      'rgb(255, 205, 86)'

    ]
  }]
};

chartBarPolar = new Chart(document.getElementById('polar'), {
		type: 'polarArea',
		data: data2,
	});
</script>



</div>

<style>
    .counter {
        background-color: #f5f5f5;
        padding: 20px 0;
        border-radius: 5px;
    }

    .count-title {
        font-size: 40px;
        font-weight: normal;
        margin-top: 10px;
        margin-bottom: 0;
        text-align: center;
    }

    .count-text {
        font-size: 13px;
        font-weight: normal;
        margin-top: 10px;
        margin-bottom: 0;
        text-align: center;
    }

    .fa-2x {
        margin: 0 auto;
        float: none;
        display: table;
        color: #4ad1e5;
    }
</style>

<script>
    (function ($) {
        $.fn.countTo = function (options) {
            options = options || {};

            return $(this).each(function () {
                // set options for current element
                var settings = $.extend(
                    {},
                    $.fn.countTo.defaults,
                    {
                        from: $(this).data("from"),
                        to: $(this).data("to"),
                        speed: $(this).data("speed"),
                        refreshInterval: $(this).data("refresh-interval"),
                        decimals: $(this).data("decimals"),
                    },
                    options
                );

                // how many times to update the value, and how much to increment the value on each update
                var loops = Math.ceil(
                        settings.speed / settings.refreshInterval
                    ),
                    increment = (settings.to - settings.from) / loops;

                // references & variables that will change with each update
                var self = this,
                    $self = $(this),
                    loopCount = 0,
                    value = settings.from,
                    data = $self.data("countTo") || {};

                $self.data("countTo", data);

                // if an existing interval can be found, clear it first
                if (data.interval) {
                    clearInterval(data.interval);
                }
                data.interval = setInterval(
                    updateTimer,
                    settings.refreshInterval
                );

                // initialize the element with the starting value
                render(value);

                function updateTimer() {
                    value += increment;
                    loopCount++;

                    render(value);

                    if (typeof settings.onUpdate == "function") {
                        settings.onUpdate.call(self, value);
                    }

                    if (loopCount >= loops) {
                        // remove the interval
                        $self.removeData("countTo");
                        clearInterval(data.interval);
                        value = settings.to;

                        if (typeof settings.onComplete == "function") {
                            settings.onComplete.call(self, value);
                        }
                    }
                }

                function render(value) {
                    var formattedValue = settings.formatter.call(
                        self,
                        value,
                        settings
                    );
                    $self.html(formattedValue);
                }
            });
        };

        $.fn.countTo.defaults = {
            from: 0, // the number the element should start at
            to: 0, // the number the element should end at
            speed: 1000, // how long it should take to count between the target numbers
            refreshInterval: 100, // how often the element should be updated
            decimals: 0, // the number of decimal places to show
            formatter: formatter, // handler for formatting the value before rendering
            onUpdate: null, // callback method for every time the element is updated
            onComplete: null, // callback method for when the element finishes updating
        };

        function formatter(value, settings) {
            return value.toFixed(settings.decimals);
        }
    })(jQuery);

    jQuery(function ($) {
        // custom formatting example
        $(".count-number").data("countToOptions", {
            formatter: function (value, options) {
                return value
                    .toFixed(options.decimals)
                    .replace(/\B(?=(?:\d{3})+(?!\d))/g, ",");
            },
        });

        // start all the timers
        $(".timer").each(count);

        function count(options) {
            var $this = $(this);
            options = $.extend(
                {},
                options || {},
                $this.data("countToOptions") || {}
            );
            $this.countTo(options);
        }
    });
</script>

@endsection
