<div>
    <head>
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        
    </head>

    <div>
        <canvas id="employeeStatusChart" width="400" height="400"></canvas>
    </div>
    
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var ctx = document.getElementById('employeeStatusChart').getContext('2d');
            
            var employeesData = @json($employees);
            
            new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: employeesData.labels,
                    datasets: [{
                        label: 'Cantidad de empleados Activos',
                        data: employeesData.data,
                        backgroundColor: 'rgba(75, 192, 192, 0.2)',
                        borderColor: 'rgba(75, 192, 192, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    indexAxis: 'y',
                    scales: {
                        x: {
                            beginAtZero: true,
                            maxTicksLimit: 10
                        },
                        y: {
                            offset: true
                        }
                    },
                    plugins: {
                        legend: {
                            display: false
                        }
                    }
                }
            });
        });
    </script>
    
</div>
