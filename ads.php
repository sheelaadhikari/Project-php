<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DoshroDeal | Buy and Sell Online</title>
    <link rel="stylesheet" href="./style.css">
    <link rel="stylesheet" href="./login.css">
    <!-- <link rel="stylesheet" href="./login.css"> -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<html>

<body>

   
       
            <div class="row">

                <form action="add.php" method="POST" enctype="multipart/form-data">


                    <div class="ads-form">
                        <!-- <label>ads_id : </label>
                        <input type="Number" placeholder="Enter id" name="ads_id"><br><br> -->

                        <label>title : </label>
                        <input type="text area" placeholder="Enter Title" name="title"><br><br>


                        <label>price: </label>
                        <input type="Number" placeholder="Enter Price" name="price" value = 3433><br><br>

                        <label>description : </label>
                        <input type="text area" placeholder="enter description" name="description" value = "thisisdescription"><br><br>


                        <label>product_condition : </label>
                        <input type="text area" placeholder="enter condition" name="product_condition" value="used for one ear"><br><br>

                        <label>category : </label>
                        <input type="text" placeholder="Enter id" name="category" value = "furniture"><br><br>


                        <label>location : </label>
                        <input type="text" placeholder="Enter location" name="location" value="pokhara"><br><br>

                        <label>filename : </label>
                        <input type="file" name="image" accept=".png, .gif, .jpg, .jpeg">
   
                        <button type="submit" value="submit" name="submit">submit</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</body>

</html>