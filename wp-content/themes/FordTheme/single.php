
<?php
  get_header();
  if(get_the_post_thumbnail_url($postID))
  {
      $sPostSlikaURI = get_the_post_thumbnail_url($postID);
  }
  else 
  {
      $sPostSlikaURI = get_template_directory_uri() . '/img/no-image.png';
  }
 ?>

  <div class="container">
    <!-- Title -->
    <div class="title">
    <?php
      $postID  = $post->ID;
      $postTitle = get_the_title($postID);
      echo $postTitle;
      ?>
    </div>

      <!-- Content -->
      <div class="content">
      <?php
      $postContent = get_the_content($postID);
      echo $postContent;
      ?>
      <?php echo '<img class="card-img-top" src="'.$sPostSlikaURI.'" alt="Card image cap" style="height: 200px; object-fit:contain;">' ?>

      </div>

  </div>


  <?php
  get_footer();
?>















<!-- More custom styles -->
<style>
  .container .title{
    text-align:center;
    font-size: 4rem;
    margin: 3rem 0;
  }

  .container p{
    color:black;
    font-size: 1.4rem;
    margin: 2rem 0;
  }

  .container .content{
    font-size: 1.7rem;
    line-height: 2.5;
    padding: 2rem;
    background-color: #ddd;
    margin-bottom: 5rem;
    color:white;
  }

  .container .content h2 {
    border-bottom: 2px solid black;
    padding-bottom: 1rem;
    width: 50%;
  }
  
 
</style>