<div id="primary" class="content-area grid-parent mobile-grid-100 grid-80 tablet-grid-80">
    <main id="main" class="site-main">

    <?php if (empty($content)) : ?>
        <article id="post-1" class="post-1 post type-post status-publish format-standard hentry category-1" itemtype="https://schema.org/CreativeWork" itemscope>
          <!-- post -->
          <div class="inside-article">
            <header class="entry-header">
              <h2 class="entry-title" itemprop="headline">
                <?php $language->p('No pages found') ?>
              </h2>
            </header>
          </div>
        </article><!-- end of post -->
      <?php endif ?>


      <?php foreach ($content as $page) : ?>

        <!-- post -->
        <article id="post-<?php echo $page->key(); ?>" class="post-<?php echo $page->key(); ?> post type-post status-publish format-standard hentry category-1" itemtype="https://schema.org/CreativeWork" itemscope>
          <div class="inside-article">

            <header class="entry-header">

              <!-- Load Bludit Plugins: Page Begin -->
              <?php Theme::plugins('pageBegin'); ?>

              <!-- Cover Image -->
              <?php if ($page->coverImage()) : ?>
                <figure class="cover-image size-large is-resized"><img src="<?php echo $page->coverImage(); ?>" alt="Cover Image" class="wp-image-9" width="100%" height="100%"></figure>
              <?php endif ?>

              <!-- Title -->
              <h2 class="entry-title" itemprop="headline">
                <a href="<?php echo $page->permalink(); ?>" rel="bookmark"><?php echo $page->title(); ?></a>
              </h2>

              <!-- Creation date -->
              <div class="entry-meta">
                <span class="posted-on">
                  <time class="entry-date published" itemprop="datePublished">
                    <?php echo $page->date(); ?> </time> - <?php echo $L->get('Reading time') . ': ' . $page->readingTime() ?>
                </span>
              </div>

              <!-- Breaked content -->
              <?php echo $page->contentBreak(); ?>

              <!-- "Read more" button -->
              <?php if ($page->readMore()) : ?>
                <a href="<?php echo $page->permalink(); ?>"><?php echo $L->get('Read more'); ?></a>
              <?php endif ?>

              <!-- Load Bludit Plugins: Page End -->
              <?php Theme::plugins('pageEnd'); ?>

            </header>
          </div>
        </article><!-- end of post -->
      <?php endforeach ?>

     <!-- Pagination -->
      <?php if (Paginator::numberOfPages()>1): ?>
      <div class="paginator-label">
    Pages : 
      </div>
      <nav class="paginator">
       <!-- Pagination Perru -->
     <?php 
    if(!isset($_GET['page'])){
      $getPage = 1;
    } else {
      $getPage = $_GET['page'];
    } 
    ?>
    <ul class="list-group flex-md-row">

          <!-- Previous button -->
          <?php if (Paginator::showPrev()): ?>
          <li class="list-group-item">
            <a class="btn" href="<?php echo Paginator::previousPageUrl() ?>" tabindex="-1"><< 
              <?php echo $L->get('Previous'); ?></a>
          </li>
          <?php endif; ?>

          <!-- Home button -->
          <!-- <li class="list-group-item <?php if (Paginator::currentPage()==1) echo 'disabled' ?>">
            <a class="btn" href="<?php echo Theme::siteUrl() ?>">Accueil</a>
          </li> -->

      <?php if ($getPage >= 4) { ?>
      <li class="list-group-item">
        <a class="btn" href="<?php echo parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH); ?>">Début</a>
      </li>
          <li>...&nbsp;</li>
          <?php } ?>
          
      <?php if ($getPage >= 3) { ?>
      <li class="list-group-item">
        <a class="btn" href="<?php echo parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH); ?>
  ?page=<?php echo $getPage - 2; ?>"><?php echo $getPage - 2; ?></a>
      </li>
      <?php } ?>
          
      <?php if ($getPage >= 2) { ?>
      <li class="list-group-item">
        <a class="btn" href="<?php echo parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH); ?>
  ?page=<?php echo $getPage - 1; ?>"><?php echo $getPage - 1; ?></a>
      </li>
      <?php } ?>
          
      <?php if ($getPage) { ?>
      <li class="list-group-item">
        <a class="btn btn-selected" href="<?php echo parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH); ?>
  ?page=<?php echo $getPage; ?>"><?php echo $getPage; ?></a>
      </li>
      <?php } ?>
         
      <?php if (Paginator::numberOfPages()-1 >= $getPage) { ?>
      <li class="list-group-item">
        <a class="btn" href="<?php echo parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH); ?>
  ?page=<?php echo $getPage + 1; ?>"><?php echo $getPage + 1; ?></a>
      </li>
          
      <?php } ?>
      <?php if (Paginator::numberOfPages()-2 >= $getPage) { ?>
      <li class="list-group-item">
        <a class="btn" href="<?php echo parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH); ?>?page=<?php echo $getPage + 2; ?>"><?php echo $getPage + 2; ?></a>
      </li>
      <?php } ?>
           
          
          <?php if (Paginator::numberOfPages()-3 >= $getPage) { ?>
      <li>...&nbsp;</li>
          <li class="list-group-item">
        <a class="btn" href="<?php echo parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH).'?page='.Paginator::numberOfPages(); ?>">Fin</a>
      </li>
      <?php } ?>

          <!-- Next button -->
          <?php if (Paginator::showNext()): ?>
          <li class="list-group-item">
            <a class="btn" href="<?php echo Paginator::nextPageUrl() ?>"><?php echo $L->get('Next'); ?> >> </a>
          </li>
          <?php endif; ?> 

        </ul>
      </nav>
      <?php endif ?>



    </main>
    <!-- #main -->
  </div>