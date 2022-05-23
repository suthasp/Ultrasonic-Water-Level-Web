<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CN-PBI Monitor Water Level</title>
    <link rel="stylesheet" href="css/stylemobile.css">
    <!-- <link rel="stylesheet" href="css/style.css"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">


</head>

<body>
    <nav>
        <span class="nav-toggle" id="js-nav-toggle">
            <i class="fas fa-bars"></i>
        </span>
        <div class="logo">
            <h1>CN-PBI</h1>
        </div>
        <ul id="js-menu">
            <!-- <li><a href="#">Home</a></li>
            <li><a href="#">About</a></li> -->
            <li><a href="#">Services</a></li>
            <li><a href="#">Contact</a></li>
        </ul>
    </nav>

    <section class="info1">
        <div class="container">
            <div class="info1_area">
                      <canvas id="graphCanvas"></canvas>
                </div>
            </div>
        </div>
    </section>


    <script src="js/script.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
    <script>
        $(document).ready(function() {
            showGraph();
        });

        function showGraph(){
            {
                $.post("data.php", function(data) {
                    console.log(data);
                    let time = [];
                    let level = [];

                    for (let i in data) {
                        time.push(data[i].reading_time);
                        level.push(data[i].value1);
                    }

                    let chartdata = {
                        labels: time,
                        datasets: [{
                                label: 'Water Level(cm)',
                                backgroundColor: '#49e2ff',
                                borderColor: '#46d5f1',
                                hoverBackgroundColor: '#CCCCCC',
                                hoverBorderColor: '#666666',
                                data: level
                        }]
                    };

                    let graphTarget = $('#graphCanvas');
                    let barGraph = new Chart(graphTarget, {
                        type: 'line',
                        data: chartdata,
                        options: {
                                scales: {
                                    yAxes: [{
                                        ticks: {
                                        beginAtZero: true
                                                }
                                            }]
                                        }
                                }
                                    
                    })
                })
            }
        }
    </script>

<footer>
        <p>Copyright &copy; 2020 | CN-PBI</p>
    </footer>

</body>

</html>