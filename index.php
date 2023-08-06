<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Magical Review</title>
    <style>
        /* Add your custom CSS styles here */
        body {
            font-family: 'Georgia', serif;
            background-color: #000;
            margin: 0;
            padding: 0;
            color: #fff;
            overflow: hidden;
            }
            body
            {
            cursor: url('wand.png'), auto;
        }
        .stars {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            pointer-events: none;
            perspective: 1000px; /* Added perspective for 3D effect */
            animation: twinkling 5s infinite;
        }
        @keyframes twinkling {
            0% { opacity: 0; }
            50% { opacity: 1; }
            100% { opacity: 0; }
        }
        .star {
            position: absolute;
            width: 3px;
            height: 3px;
            background: #ffcc00;
            border-radius: 50%;
            transform-origin: center center 0; /* Set transform origin for 3D effect */
            animation: twinkle 2s infinite;
        }
        @keyframes twinkle {
            0%, 100% { transform: translateY(0) translateZ(0) rotateY(0); opacity: 0; }
            50% { transform: translateY(-10px) translateZ(40px) rotateY(180deg); opacity: 1; }
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: rgba(0, 0, 0, 0.7);
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            opacity: 0;
            transform: translateY(-20px);
            animation: fadeInUp 0.5s forwards;
        }
        @keyframes fadeInUp {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
            opacity: 0;
            transform: translateY(-20px);
            animation: fadeInUp 0.5s forwards;
            animation-delay: 0.2s;
        }
        .rating {
            display: inline-block;
            font-size: 28px;
            color: #ffcc00;
            opacity: 0;
            transform: translateY(-20px);
            animation: fadeInUp 0.5s forwards;
            animation-delay: 0.4s;
        }
        .rating > input {
            display: none;
        }
        .rating > label {
            position: relative;
            margin: 0.5em;
            cursor: pointer;
            transform-style: preserve-3d; /* Enable 3D transformations */
        }
        .rating > label:before {
            content: '\2605';
            position: absolute;
            opacity: 0.5;
            transform: translateZ(1px); /* Add a slight 3D effect */
            transition: transform 0.3s, opacity 0.3s;
        }
        .rating > label:hover:before,
        .rating > label:hover ~ label:before,
        .rating > input:checked ~ label:before {
            opacity: 1;
            transform: translateZ(6px) scale(1.5); /* Enhanced 3D effect on hover and checked */
        }
        .review-form {
            text-align: center;
            margin-top: 20px;
            opacity: 0;
            transform: translateY(-20px);
            animation: fadeInUp 0.5s forwards;
            animation-delay: 0.6s;
        }
        .review-form textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            transition: border-color 0.3s;
        }
        .review-form textarea:focus {
            outline: none;
            border-color: #333;
        }
        .submit-btn {
            background-color: #333;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        .submit-btn:hover {
            background-color: #555;
        }
    </style>
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const starsContainer = document.querySelector(".stars");

            function createStar(x, y) {
                const star = document.createElement("div");
                star.className = "star";
                star.style.left = `${x}px`;
                star.style.top = `${y}px`;
                starsContainer.appendChild(star);

                setTimeout(() => {
                    star.remove();
                }, 2000);
            }

            document.addEventListener("mousemove", (e) => {
                createStar(e.clientX, e.clientY);
            });
        });

        window.addEventListener("load", () => {
            const container = document.querySelector(".container");
            container.style.opacity = 1;
            container.style.transform = "translateY(0)";
        });
    </script>
</head>
<body>
    <div class="stars">
        <!-- Stars will appear here dynamically -->
    </div>

    <div class="container">
        <div class="header">
            <h1>Magical Website Review</h1>
            <p>Rate and review your enchanting experience!</p>
        </div>

       <div class="rating">
    <input type="radio" name="rating" id="star1" value="1"><label for="star1"></label>
    <input type="radio" name="rating" id="star2" value="2"><label for="star2"></label>
    <input type="radio" name="rating" id="star3" value="3"><label for="star3"></label>
    <input type="radio" name="rating" id="star4" value="4"><label for="star4"></label>
    <input type="radio" name="rating" id="star5" value="5"><label for="star5"></label>
</div>



        <form class="review-form" action="process_review.php" method="POST">
            <label for="review">Write an enchanting review:</label><br>
            <textarea name="review" id="review" rows="4" cols="50"></textarea><br>
            <input class="submit-btn" type="submit" value="Cast Your Review Spell">
        </form>
    </div>
</body>
</html>
