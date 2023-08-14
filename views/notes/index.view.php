<?php require base_path('views/partials/head.php'); ?>


    <div class="min-h-full">
        <?php
        require base_path('views/partials/nav.php');
        require base_path('views/partials/banner.php');
        ?>

        <main>
            <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
                <?php foreach ($notes as $note):?>
                    <li>
                        <a href="note?id=<?= $note['id']?>" class="text-blue-600 hover:text-blue-800 hover:underline">
                        <?= htmlspecialchars($note['body']) ?>
                        </a>
                    </li>
                <?php  endforeach;?>
                <p class="mt-6">
                    <a href="/notes/create" class="text-blue-500 hover:underline">Create Note</a>
                </p>
            </div>
        </main>
    </div>
<?php require base_path('views/partials/footer.php')  ?>