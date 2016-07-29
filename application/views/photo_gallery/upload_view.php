<?php $this->load->model('gallery'); ?>
<div id="main">
            <div id="status" align="right" style="padding-top:6em;">
                Welcome <?php echo $this->session->userdata('username');?>&nbsp;&nbsp;&nbsp;
                <a href="<?php echo $url."logout/"; ?>">Log Out</a>
            </div>

            <?php echo $message ; //echo $gallery_name ; ?>

            <form action="#" enctype="multipart/form-data" method="post">
            <input type="hidden" name="MAX_SIZE" value="1000000" />
            <input type="file"   name="file_upload"  />
            Caption : <input type="text"   name="caption"  value=""<?php echo isset($_POST['caption']) ? $_POST['caption'] : "" ?>/>
            Select Gallery : <select name="gallery_name">

              <?php $galleries = gallery::get_all_galleries( ) ;
              $i = 1 ;
              foreach ($galleries as $gallery) : ?>

                <option id="<?php echo $i++; ?>"><?php echo $gallery->name;?> </option>

            <?php endforeach ;?>
            </select>
            <input type="submit" name="submit" value="Upload Photo" />
            </form>

        </div>
