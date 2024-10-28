<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-commerce Website Review</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="../css/review.css?v=<?php echo time(); ?>">
</head>
<body>

<form action="../php/addreview.php" method="post">
        <h2>Chutki Mai Shopping.com</h2>
        
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" placeholder="Enter your name" required>

        <label for="gender">Gender:</label>
        <select id="gender" name="gender" required>
            <option value="" disabled selected>Select the gender</option>
            <option value="male">Male</option>
            <option value="female">Female</option>
            <option value="other">Other</option>
        </select>

        <label for="country">Country:</label>
        <select id="country" name="country" required>
            <option value="" disabled selected>Select your country</option>
            <option value="Pakistan">Pakistan</option>
            <option value="India">India</option>
            <option value="China">China</option>
            <option value="Saudi Arabia">Saudi Arabia</option>
            <option value="America">America</option>
            <option value="Australia">Australia</option>
            <option value="Canada">Canada</option>
            <option value="Switzerland">Switzerland</option>
            <option value="England">England</option>
            <option value="Japan">Japan</option>
        </select>

        <label for="rating">Rating:</label>
    <div class="rating">
        <input type="radio" id="star5" name="rating" value="5">
        <label for="star5">&#9733;</label>
        <input type="radio" id="star4" name="rating" value="4">
        <label for="star4">&#9733;</label>
        <input type="radio" id="star3" name="rating" value="3">
        <label for="star3">&#9733;</label>
        <input type="radio" id="star2" name="rating" value="2">
        <label for="star2">&#9733;</label>
        <input type="radio" id="star1" name="rating" value="1">
        <label for="star1">&#9733;</label>
    </div>
        </div>

        <label for="suggestions">Suggestions:</label>
        <textarea id="suggestions" name="suggestions" placeholder="Any suggestions or comments?"></textarea>

        <button type="submit">Submit</button>
    </form>

    <script src="../js/review.js"></script>
</body>
</html>
