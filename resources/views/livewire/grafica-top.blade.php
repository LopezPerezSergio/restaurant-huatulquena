<div>
    <head>
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    </head>

    <canvas id="productChart"></canvas>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var ctx = document.getElementById('productChart').getContext('2d');

            var productData = @json($products);

            // Ordena los datos por contador en orden descendente
            productData.sort((a, b) => b.contador - a.contador);

            // Limita los datos a los 3 productos más vendidos
            var topProducts = productData.slice(0, 3);

            var labels = topProducts.map(item => item.nombre);
            var data = topProducts.map(item => item.contador);
            
            var backgroundColors = generateRandomColors(topProducts.length);

            new Chart(ctx, {
                type: 'line',
                data: {
                    labels: labels,
                    datasets: [{
                        label: 'Cantidad de productos vendidos',
                        data: data,
                        backgroundColor: backgroundColors,
                        borderColor: 'rgba(75, 192, 192, 1)',
                        borderWidth: 1,
                        fill: false
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true,
                            maxTicksLimit: 10
                        }
                    },
                    plugins: {
                        title: {
                            display: true,
                            text: 'TOP 3 "Productos más vendidos"'
                        }
                    }
                }
            });
        });

        function generateRandomColors(length) {
            var colors = [];
            for (var i = 0; i < length; i++) {
                var color = 'rgba(' + Math.floor(Math.random() * 256) + ', ' + Math.floor(Math.random() * 256) + ', ' + Math.floor(Math.random() * 256) + ', 0.2)';
                colors.push(color);
            }
            return colors;
        }
    </script>
</div>
