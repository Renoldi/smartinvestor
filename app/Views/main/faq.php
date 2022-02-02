<!-- ======= F.A.Q Section ======= -->
<section id="faq" class="faq section-bg">
    <div class="container">

        <div class="section-title" data-aos="fade-up">
            <h2>F.A.Q</h2>
            <p>Frequently Asked Questions</p>
        </div>
        <div class="faq-list">
            <?php

            foreach ($paginate as $data => $val) {
                $collapse = $data == 0 ? "collapse collapsed" : "collapse";
                $show = $data == 0 ? "show" : "";
                echo '
                <ul>
                <li data-aos="fade-up">
                    <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse" class="' . $collapse . '"  data-bs-target="#faq-list-' . $data . '">' . $val->title . '<i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                    <div id="faq-list-' . $data . '" class="collapse ' . $show . '" data-bs-parent=".faq-list">
                        <p>
                            ' . $val->desc . '
                        </p>
                    </div>
                </li>
            ';
            }
            ?>

        </div>
        <?= $pager->links('fags', 'paging') ?>

</section><!-- End F.A.Q Section -->