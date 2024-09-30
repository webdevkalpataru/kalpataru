<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        /* scrollbar */
        ::-webkit-scrollbar {
            width: 20px;
        }

        ::-webkit-scrollbar-track {
            background: #f1f1f1;
        }

        ::-webkit-scrollbar-thumb {
            background: linear-gradient(180deg, rgb(230, 156, 59), rgba(217, 237, 191, 1));
            border-radius: 10px;
            border: 3px solid #f1f1f1;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: linear-gradient(180deg, rgb(207, 140, 53), rgba(195, 213, 172, 1));
            opacity: 30%;
            border-radius: 10px;
            border: 3px solid #f1f1f1;
        }

        /* cursor */
        .custom-cursor {
            cursor: none;
            position: fixed;
            width: 30px;
            height: 30px;
            background-color: rgba(217, 237, 191, 0.8);
            border: 3px solid #fff;
            border-radius: 50%;
            pointer-events: none;
            transform: translate(-50%, -50%);
            z-index: 9999;
            transition: transform 0.1s ease-out, background-color 0.3s;
            animation: moveAnimation 0.2s ease-in-out;
            box-shadow: 0 0 10px rgba(217, 237, 191, 0.8), 
                0 0 20px rgba(217, 237, 191, 0.6), 
                0 0 30px rgba(217, 237, 191, 0.4);
        }

        @keyframes moveAnimation {
            0% {
                transform: translate(-50%, -50%) scale(1);
            }

            50% {
                transform: translate(-50%, -50%) scale(1.2);
            }

            100% {
                transform: translate(-50%, -50%) scale(1);
            }
        }

        * :hover~.custom-cursor {
            background-color: rgba(217, 237, 191, 1);
            transform: scale(1.5);
            box-shadow: 0 0 20px rgba(217, 237, 191, 1), 
                0 0 40px rgba(217, 237, 191, 0.8), 
                0 0 60px rgba(217, 237, 191, 0.6);
        }

        /* selection */
        ::selection {
            background-color: #2C7865;
            color: white;
        }
    </style>
</head>

<body>
    <button id="scroll" class="fixed lg:bottom-14 lg:right-14 right-1/2 translate-x-1/2 bottom-1 text-white p-2 rounded-full hidden lg:opacity-100 opacity-50 transition-opacity duration-300">
        <img class="lg:w-14 lg:h-14 w-10 h-10" src="/images/scroll.svg" alt="Scroll Up">
    </button>
    <div class="custom-cursor" id="customCursor"></div>

    <script>
        /* scroll */
        document.addEventListener('DOMContentLoaded', () => {
            const scroll = document.getElementById('scroll');

            const handleScroll = () => {
                if (window.scrollY > 300) {
                    scroll.classList.remove('hidden');
                } else {
                    scroll.classList.add('hidden');
                }
            };

            const scrollToTop = () => {
                window.scrollTo({
                    top: 0,
                    behavior: 'smooth'
                });
            };

            scroll.addEventListener('click', scrollToTop);
            window.addEventListener('scroll', handleScroll);
        });

        /* cursor */
        document.addEventListener('mousemove', function(e) {
            const cursor = document.getElementById('customCursor');
            cursor.style.left = e.clientX + 'px';
            cursor.style.top = e.clientY + 'px';
        });
    </script>

</body>

</html>