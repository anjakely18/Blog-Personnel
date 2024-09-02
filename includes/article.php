    <div class="single-article">
        <div class="img-container">
            <img src="<?php echo $article_data['image'] ?>" alt="<?php echo $article_data['title'] ?>" />
        </div>
        <h2><?php echo $article_data['title'] ?></h2>
        <h3><?php echo $article_data['formatted_date'] ?></h3>
        <div class="text-content">
            <p>
                <?php echo $article_data['content'] ?>
            </p>

        </div>
    </div>