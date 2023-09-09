 <!-- Alert Start -->
 <?php if(isset($_SESSION['status'])){ ?>
 <div class="alert alert-dismissible fade show" role="alert"
     style="z-index: 2;width:400px;height: 50px;position: relative;left: 715px;top: 10px;bottom: 10px;background-color: #7CFC00;">
     <?php 
            echo $_SESSION['status']; 
            unset($_SESSION['status']);   
            ?>
     <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
 </div>
 <?php } ?>
 <!-- Alert End -->