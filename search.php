<?php
    include_once 'header.php';
    ?>
<div class="container px-2 py-7">
    <div class="row d-flex justify-content-center align-items-center p-2">

        <div class="col-md-8">

            <div class="search">
                <i class="cus-fa"></i>
                <form class="example1" action="search.php">
                    <input type="text" class="form-control" placeholder="Search..." style="width: 300px;" name="search">
                    <button class="btn btn-primary" name="btn btn-Search">Search</button>
                </form>
            </div>

        </div>

    </div>
    <h2>All Product</h2>
    <div class="row">
        <?php
            include_once 'connect.php';
            $c = new Connect();
            $dblink = $c->connectToPDO();
            $nameP = $_GET['search'];
            $sql = "SELECT * FROM product Where pname LIKE ?";
            
            $re = $dblink->prepare($sql);
           // $re->bindparam(':nameP',$nameP, PDO ::PARAM_STR);
            $re->execute(array("%$nameP%"));
            $rows = $re->fetchAll(PDO::FETCH_BOTH);
            
            foreach($rows as $r):
                        ?>
        <div class="col-md-4 pb-3">
                <div class="display-flex">
                    <div class="card">
                    <img src="../simpleweb/images/<?=$r['image']?>" class="card-img-top" alt="Product1>" style="margin: auto;
                        width: auto; height: 290px;" />
                    <div class="card-body">
                        <a href="detail.php?id=<?=$r['pid']?>" class="text-decoration-none">
                            <h5 class="card-title"><?=$r['pname']?></h5>
                        </a>
                        <h6 class="card-subtitle mb-2 text-muted"><span>&#8363;</span><?=$r['price']?></h6>
                        <a href="detail.php?id=<?=$r['pid']?>" class="btn btn-primary" >Add to Cart</a>
                    </div>
                </div>
            </div>
        </div>
        <?php
            endforeach;
            //else:
            //   echo "Not found";
            ?>
    </div>
</div>
<?php
include_once 'footer.php';
?>