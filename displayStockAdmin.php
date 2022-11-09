<?php 
    include "createBookTable.php";

    $conn = mysqli_connect('localhost','root','', 'book_store_db');
	if (!$conn){
		die("Failed to connect to the database: " . mysqli_connect_error());
	}

    $title1 = "N/A"; $title2 = "N/A"; $title3 = "N/A"; $title4 = "N/A"; $title5 = "N/A";
    $isbn1 = "N/A"; $isbn2 = "N/A"; $isbn3 = "N/A"; $isbn4 = "N/A"; $isbn5 = "N/A";
    $qty1 = "N/A"; $qty2 = "N/A"; $qty3 = "N/A"; $qty4 = "N/A"; $qty5 = "N/A";
    $frontCov1 = ""; $frontCov2 = ""; $frontCov3 = ""; $frontCov4 = ""; $frontCov5 = "";
    $currentRow = 0;
    $totalRow = 0;
    $maxPageNum = 0;
    $lowStock = 0;

    if(isset($_SESSION['search']))
    {
        $search=$_SESSION['search'];
        if($search=="")
        {
            $query="SELECT * FROM book";
        }
        else
        {
            $query="SELECT * FROM book WHERE (ISBN LIKE '%".$search."%') OR (bookName LIKE '%".$search."%')
                OR (author LIKE '%".$search."%') OR (publicationDate LIKE '%".$search."%') OR (description LIKE '%".$search."%')
                OR (tradePrice LIKE '%".$search."%') OR (retailPrice LIKE '%".$search."%') OR (quantity LIKE '%".$search."%')";
        }
    }
    else
    {
        $query="SELECT * FROM book";
    }
    $result = mysqli_query($conn, $query);
    while ($row = mysqli_fetch_array($result)){
        $totalRow++;
        if($row['quantity'] < 5){
            $lowStock++;
        }
    }

    $maxPageNum = $totalRow / 5;
    if (is_int($maxPageNum)){
        $maxPageNum = intdiv($totalRow, 5);
    }else {
        $maxPageNum = intdiv($totalRow, 5) + 1;
    }

    if (isset($_SESSION['left_clicked'])){
        if ($_SESSION['left_clicked'] === "true"){
            if ($_SESSION['currentPageNum'] != 1){
                $rowNum = 1;

                $result = mysqli_query($conn, $query);
                while ($row = mysqli_fetch_array($result)){
                    $currentRow++;
                    if ($currentRow <= (($_SESSION['currentPageNum']-1)*5) && $currentRow > (($_SESSION['currentPageNum']-2)*5)){
                        $title = "title" . $rowNum;
                        $isbn = "isbn" . $rowNum;
                        $qty = "qty" . $rowNum;
                        $frontCov = "frontCov" . $rowNum;

                        $$title = $row['bookName'];
                        $$isbn = $row['ISBN'];
                        $$qty = $row['quantity'];
                        $$frontCov = $row['frontCover'];
                        $rowNum++;
                    }
                }

                $_SESSION['currentPageNum'] = $_SESSION['currentPageNum'] - 1;
            } else {
                $rowNum = 1;

                $result = mysqli_query($conn, $query);
                while ($row = mysqli_fetch_array($result)){
                    $currentRow++;
                    if ($currentRow <= ($maxPageNum*5) && $currentRow > (($maxPageNum-1)*5)){
                        $title = "title" . $rowNum;
                        $isbn = "isbn" . $rowNum;
                        $qty = "qty" . $rowNum;
                        $frontCov = "frontCov" . $rowNum;

                        $$title = $row['bookName'];
                        $$isbn = $row['ISBN'];
                        $$qty = $row['quantity'];
                        $$frontCov = $row['frontCover'];
                        $rowNum++;
                    }
                }

                $_SESSION['currentPageNum'] = $maxPageNum;
            }
        }

        unset($_SESSION['left_clicked']);
        
    } else if (isset($_SESSION['right_clicked'])){
        if ($_SESSION['right_clicked'] === "true"){
            if ($_SESSION['currentPageNum'] < $maxPageNum){
                $rowNum = 1;

                $result = mysqli_query($conn, $query);
                while ($row = mysqli_fetch_array($result)){
                    $currentRow++;
                    if ($currentRow > ($_SESSION['currentPageNum']*5) && $currentRow <= (($_SESSION['currentPageNum']+1)*5)){
                        $title = "title" . $rowNum;
                        $isbn = "isbn" . $rowNum;
                        $qty = "qty" . $rowNum;
                        $frontCov = "frontCov" . $rowNum;

                        $$title = $row['bookName'];
                        $$isbn = $row['ISBN'];
                        $$qty = $row['quantity'];
                        $$frontCov = $row['frontCover'];
                        $rowNum++;
                    }
                }

                $_SESSION['currentPageNum'] = $_SESSION['currentPageNum'] + 1;
            } else {
                $result = mysqli_query($conn, $query);
                while ($row = mysqli_fetch_array($result)){
                    $currentRow++;
                    $title = "title" . $currentRow;
                    $isbn = "isbn" . $currentRow;
                    $qty = "qty" . $currentRow;
                    $frontCov = "frontCov" . $currentRow;

                    $$title = $row['bookName'];
                    $$isbn = $row['ISBN'];
                    $$qty = $row['quantity'];
                    $$frontCov = $row['frontCover'];
                }

                $_SESSION['currentPageNum'] = 1;
            }
        }
        
        unset($_SESSION['right_clicked']);

    } else {
        $result = mysqli_query($conn, $query);
        while ($row = mysqli_fetch_array($result)){
            $currentRow++;
            $title = "title" . $currentRow;
            $isbn = "isbn" . $currentRow;
            $qty = "qty" . $currentRow;
            $frontCov = "frontCov" . $currentRow;

            $$title = $row['bookName'];
            $$isbn = $row['ISBN'];
            $$qty = $row['quantity'];
            $$frontCov = $row['frontCover'];
        }

        $_SESSION['currentPageNum'] = 1;
        // if($query!="SELECT * FROM book")
        // {
        //     if(isset($_SESSION['search']))
        //     {
        //         unset($_SESSION['search']);
        //     }
        // }
    }

    mysqli_close($conn);
?>