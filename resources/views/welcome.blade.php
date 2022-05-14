<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>ADMIN Susantokun</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@simonwep/pickr/dist/themes/monolith.min.css"/> <!-- 'monolith' theme -->

        <!-- Styles -->
        <style>
            .panel {
                width: 100%;
                height: 40vh;
                margin-bottom: 10px;
                background-color: rgb(243,142,0);
            }
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }
        </style>
    </head>
    <body id="panel">
        <div class="flex-center position-ref full-height">
            <div class="content">
                <p><b>Hi ... nice to meet you :)</b></p>
                <div class="color-picker">

                </div>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/@simonwep/pickr/dist/pickr.min.js"></script>
        <script>
            const pickr = Pickr.create({
                el: '.color-picker',
                theme: 'monolith',

                swatches: [
                    'rgba(244, 67, 54, 1)',
                    'rgba(233, 30, 99, 0.95)',
                    'rgba(156, 39, 176, 0.9)',
                    'rgba(103, 58, 183, 0.85)',
                    'rgba(63, 81, 181, 0.8)',
                    'rgba(33, 150, 243, 0.75)',
                    'rgba(3, 169, 244, 0.7)',
                    'rgba(0, 188, 212, 0.7)'
                ],

                components: {
                    preview: true,
                    opacity: true,
                    hue: true,
                }
            });
            pickr.on('change', (...args) => {
                let color = args[0].toRGBA();
                // console.log(color);
                this.panel.style.backgroundColor = `rgba(${color[0]},${color[1]},${color[2]},${color[3]}`
            })
        </script>
    </body>
</html>
