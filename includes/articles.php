<div class="hero-img">
    <img src="assets/images/fleur.png" alt="oiseau" />
</div>

<main>
    <div class="articles">
        <?php foreach ($articles as $article): ?>
            <div class="article">
                <img src=<?php echo $article["image"] ?> alt="image" />
                <a href="<?php echo htmlspecialchars('single.php?id=' . $article['id']) ?>">
                    <h4><?php echo $article["title"] ?></h4>
                </a>
                <i><?php echo $article["category"] ?></i>
                <p><?php echo $article["formatted_date"] ?></p>
            </div>
        <?php endforeach; ?>

        <div class="navigation">
            <button class="btn number-btn">1</button>
            <button class="btn number-btn">2</button>
        </div>
    </div>