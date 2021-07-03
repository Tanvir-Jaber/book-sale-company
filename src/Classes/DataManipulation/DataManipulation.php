<?php


namespace App\DataManipulation;
use App\Model\Database as DB;
use  App\Utility\Utility;



class DataManipulation extends DB
{
    public $password;

    public function setupdatepass($data){
        if (array_key_exists('re_pass', $data)) {
            $this->password = $data['re_pass'];
        }
    }

    public function getPostDataToShow(){
        $sql = "SELECT * FROM post WHERE approved = 'yes' ORDER BY no DESC ";
        $data = $this->Dbconnect->query($sql);
        $data->setFetchMode(\PDO::FETCH_OBJ);
        $status = $data->fetchAll();
        return $status;
    }

    public function Search(){
        $sql = "SELECT * FROM users where checkActive = 'no' && position != '7' && emailtoken = 'yes'";
        $data = $this->Dbconnect->query($sql);
        $data->setFetchMode(\PDO::FETCH_OBJ);
        $status = $data->fetchAll();
        return $status;
    }
    public function Admin(){
        $sql = "SELECT * FROM users where checkActive = 'no' && position = 'Admin' && emailtoken = 'yes'";
        $data = $this->Dbconnect->query($sql);
        $data->setFetchMode(\PDO::FETCH_OBJ);
        $status = $data->fetchAll();
        return $status;
    }
    public function SearchVia(){
        $sql = "SELECT * FROM users where checkActive = 'yes' && position != 'Admin' && emailtoken = 'yes'";
        $data = $this->Dbconnect->query($sql);
        $data->setFetchMode(\PDO::FETCH_OBJ);
        $status = $data->fetchAll();
        return $status;
    }
    public function checkOwnerView($email){
        $sql = "SELECT * FROM shop_owner where email = '".$email."'";
        $data = $this->Dbconnect->query($sql);
        $data->setFetchMode(\PDO::FETCH_OBJ);
        $status = $data->fetch();
        return $status;
    }  public function checkOwnerUserView($email){
        $sql = "SELECT * FROM user_details where email = '".$email."'";
        $data = $this->Dbconnect->query($sql);
        $data->setFetchMode(\PDO::FETCH_OBJ);
        $status = $data->fetch();
        return $status;
    }
     public function SearchAllDeleteData(){
        $sql = "SELECT * FROM users where checkActive = 'delete' && position != 'Admin' && emailtoken = 'yes'";
        $data = $this->Dbconnect->query($sql);
        $data->setFetchMode(\PDO::FETCH_OBJ);
        $status = $data->fetchAll();
        return $status;
    }

    public function PendingRequest(){
        $sql = "SELECT * FROM users where checkActive = 'no' && position != 'Admin' && emailtoken = 'yes'";
        $data = $this->Dbconnect->query($sql);
        $data->setFetchMode(\PDO::FETCH_OBJ);
        $status = $data->fetchAll();
        return $status;
    }public function allCartviaUserEmail($Meemail){
        $sql = "SELECT * FROM cart where email = '".$Meemail."' && status = '0'";
        $data = $this->Dbconnect->query($sql);
        $data->setFetchMode(\PDO::FETCH_OBJ);
        $status = $data->fetchAll();
        return $status;
    }
    public function PendingPostCountRequest(){
        $sql = "SELECT * FROM post where approved = 'no' && commentNo is NULL  ";
        $data = $this->Dbconnect->query($sql);
        $data->setFetchMode(\PDO::FETCH_OBJ);
        $status = $data->fetchAll();
        return $status;
    }
    public function viewSellerInfo(){
        $sql = "SELECT * FROM users where checkActive = 'yes' && position != 'Admin' && position != 'Owner' && emailtoken = 'yes'";
        $data = $this->Dbconnect->query($sql);
        $data->setFetchMode(\PDO::FETCH_OBJ);
        $status = $data->fetchAll();
        return $status;
    }
    public function viewConfimrListInfo($id){
        $sql = "SELECT * FROM product_confirm where user_id_From = '".$id."' && status = 0 ";
        $data = $this->Dbconnect->query($sql);
        $data->setFetchMode(\PDO::FETCH_OBJ);
        $status = $data->fetchAll();
        return $status;
    }
    public function viewConfimrStatusInfo($id){
        $sql = "SELECT * FROM product_confirm where user_id_to = '".$id."' && status = 1 ";
        $data = $this->Dbconnect->query($sql);
        $data->setFetchMode(\PDO::FETCH_OBJ);
        $status = $data->fetchAll();
        return $status;
    }

    public function viewBuyersInfo(){
        $sql = "SELECT * FROM users where checkActive = 'yes' && position != 'Admin' && position != 'User' && emailtoken = 'yes'";
        $data = $this->Dbconnect->query($sql);
        $data->setFetchMode(\PDO::FETCH_OBJ);
        $status = $data->fetchAll();
        return $status;
    }
    public function viewOwnerFullDetailsInfo(){
        $sql = "SELECT * FROM shop_owner ";
        $data = $this->Dbconnect->query($sql);
        $data->setFetchMode(\PDO::FETCH_OBJ);
        $status = $data->fetchAll();
        return $status;
    }
    public function viewExpertsInfo(){
        $sql = "SELECT * FROM users where position = 'Expert' && emailtoken = 'yes'";
        $data = $this->Dbconnect->query($sql);
        $data->setFetchMode(\PDO::FETCH_OBJ);
        $status = $data->fetchAll();
        return $status;
    }

    public function showUserProfile($email)
    {
        $sql = "select * from users where email = '".$email."'";
        $data = $this->Dbconnect->query($sql);
        $data->setFetchMode(\PDO::FETCH_OBJ);
        $status = $data->fetch();
        return $status;
    }
    public function showshopOwnersProfile($email)
    {
        $sql = "select * from shop_owner where email = '".$email."'";
        $data = $this->Dbconnect->query($sql);
        $data->setFetchMode(\PDO::FETCH_OBJ);
        $status = $data->fetch();
        return $status;
    }
    public function showshopUsersProfile($email)
    {
        $sql = "select * from user_details where email = '".$email."'";
        $data = $this->Dbconnect->query($sql);
        $data->setFetchMode(\PDO::FETCH_OBJ);
        $status = $data->fetch();
        return $status;
    }
    public function AdminCheck($id)
    {
        $sql = "select * from users where checkActive = 'yes' &&  position = 'Admin' && no = '".$id."'";
        $data = $this->Dbconnect->query($sql);
        $data->setFetchMode(\PDO::FETCH_OBJ);
        $status = $data->fetch();
        return $status;
    }
    public function viewNoticeInfo()
    {
        $sql = "select * from notice ORDER BY no DESC ";
        $data = $this->Dbconnect->query($sql);
        $data->setFetchMode(\PDO::FETCH_OBJ);
        $status = $data->fetchAll();
        return $status;
    }
    public function viewPostByUserId($user_id)
    {
        $sql = "select * from post WHERE user_id = '".$user_id."' && approved = 'yes' && commentNo is null  ORDER BY no DESC ";
        $data = $this->Dbconnect->query($sql);
        $data->setFetchMode(\PDO::FETCH_OBJ);
        $status = $data->fetchAll();
        return $status;
    }
    public function viewPostPendingByUserId($user_id)
    {
        $sql = "select * from post WHERE user_id = '".$user_id."' && approved = 'no' && commentNo is null  ORDER BY no DESC ";
        $data = $this->Dbconnect->query($sql);
        $data->setFetchMode(\PDO::FETCH_OBJ);
        $status = $data->fetchAll();
        return $status;
    }
    public function viewConfimrListRequestInfo($user_id)
    {
        $sql = "select * from product_confirm WHERE user_id_To = '".$user_id."' && status = 0";
        $data = $this->Dbconnect->query($sql);
        $data->setFetchMode(\PDO::FETCH_OBJ);
        $status = $data->fetchAll();
        return $status;
    }
    public function viewConfimrListSellersInfo($user_id)
    {
        $sql = "select * from product_confirm WHERE user_id_from = '".$user_id."' && status = 1";
        $data = $this->Dbconnect->query($sql);
        $data->setFetchMode(\PDO::FETCH_OBJ);
        $status = $data->fetchAll();
        return $status;
    }
    public function viewConfirmImage($user_id)
    {
        $sql = "select image from post WHERE no = '".$user_id."' && commentNo is null";
        $data = $this->Dbconnect->query($sql);
        $data->setFetchMode(\PDO::FETCH_OBJ);
        $status = $data->fetch();
        return $status;
    }
    public function searchquerytofind($user_id)
    {
        $sql = "select no,user_id,name,date,time,title,post,image from post WHERE post like '%$user_id%' && approved='yes' && position='Sellers' && commentNo is null";
        $data = $this->Dbconnect->query($sql);
        $data->setFetchMode(\PDO::FETCH_OBJ);
        $status = $data->fetchAll();
        return $status;
    }
    public function viewAllBooksForUsersSearch($search_type,$search)
    {
        if($search_type == 'title'){
        $sql = "select * from book_details WHERE title like '%$search%' ";
        $data = $this->Dbconnect->query($sql);
        $data->setFetchMode(\PDO::FETCH_OBJ);
        $status = $data->fetchAll();
        return $status;}
        elseif ($search_type =="shop_name"){

            $sql_email = "select email from shop_owner WHERE shop_name = '".$search."' ";
            $data_email = $this->Dbconnect->query($sql_email);
            $data_email->setFetchMode(\PDO::FETCH_OBJ);
            $status = $data_email->fetch();
            if($status){
                $sql = "select * from book_details WHERE email = '".$status->email."' ";
                $data = $this->Dbconnect->query($sql);
                $data->setFetchMode(\PDO::FETCH_OBJ);
                $status = $data->fetchAll();
                return $status;
            }
            return false;
        }
        else{
            $sql = "select * from book_details WHERE writer_name like '%$search%'";
            $data = $this->Dbconnect->query($sql);
            $data->setFetchMode(\PDO::FETCH_OBJ);
            $status = $data->fetchAll();
            return $status;
        }
    }

    public  function updateUserPassword($user_id,$re_pass){
        $array=array($re_pass);
        $sql="update  users set pass=? WHERE no =$user_id";
        $data= $this->Dbconnect->prepare($sql);
        $status=$data->execute($array);
        return $status;
    }
    public  function confimrProductStatus($user_id){
        $sql="update  product_confirm set status='1' WHERE no =$user_id";
        $data= $this->Dbconnect->exec($sql);
    }
    public  function updateCartStatusZero($email,$tr_number,$results){
        $sql="update  cart set status='1', transaction = '".$tr_number."' WHERE email = '".$email."' && cart_no = '".$results."'";
        $data= $this->Dbconnect->exec($sql);
    }
    public  function updateItemNeedCartValue($item_value,$item_no){
        $sql="update  cart set item='".$item_value."' WHERE cart_no =$item_no";
        $data= $this->Dbconnect->exec($sql);
    }
    public function userPassword($user_id){
        $sql = "SELECT password FROM users WHERE user_id=$user_id";
        $data = $this->Dbconnect->query($sql);
        $data->setFetchMode(\PDO::FETCH_OBJ);
        $satatus = $data->fetch();

        return $satatus;
    }
    public function viewOrderDetailsInfo($Meemail){
        $sql = "SELECT * FROM cart WHERE email = '".$Meemail."' && status = 1 or status = 'success' ORDER BY cart_no DESC";
        $data = $this->Dbconnect->query($sql);
        $data->setFetchMode(\PDO::FETCH_OBJ);
        $satatus = $data->fetchAll();

        return $satatus;
    }
    public function viewAdminOrderDetailsInfo(){
        $sql = "SELECT * FROM cart WHERE status = 1 or status = 'success' ORDER BY cart_no DESC";
        $data = $this->Dbconnect->query($sql);
        $data->setFetchMode(\PDO::FETCH_OBJ);
        $satatus = $data->fetchAll();

        return $satatus;
    }
    public function viewOrderShowOwnersDetailsInfo($Meemail){
        $sql = "SELECT * FROM cart WHERE owner_email = '".$Meemail."' && status = 1 or status = 'success' ORDER BY cart_no DESC";
        $data = $this->Dbconnect->query($sql);
        $data->setFetchMode(\PDO::FETCH_OBJ);
        $satatus = $data->fetchAll();

        return $satatus;
    }
    public function singleUsers($id){
        $sql = "SELECT * FROM users WHERE checkActive = 'yes' && no ='".$id."'";
        $data = $this->Dbconnect->query($sql);
        $data->setFetchMode(\PDO::FETCH_OBJ);
        $satatus = $data->fetch();

        return $satatus;
    }
    public function showratingUserId($id){
        $sql = "SELECT * FROM product_confirm WHERE rating is not NULL && user_id_To ='".$id."'";
        $data = $this->Dbconnect->query($sql);
        $data->setFetchMode(\PDO::FETCH_OBJ);
        $satatus = $data->fetchAll();

        return $satatus;
    }
    public function userRatingCheckViaFrom($id){
        $sql = "SELECT * FROM product_confirm WHERE rating is not NULL && user_id_From ='".$id."'";
        $data = $this->Dbconnect->query($sql);
        $data->setFetchMode(\PDO::FETCH_OBJ);
        $satatus = $data->fetchAll();

        return $satatus;
    }
    public function confirmProductInformationByNo($id){
        $sql = "SELECT user_id_To FROM product_confirm WHERE no ='".$id."'";
        $data = $this->Dbconnect->query($sql);
        $data->setFetchMode(\PDO::FETCH_OBJ);
        $satatus = $data->fetch();

        return $satatus;
    }


    public function postDataCollectviaUserId($id){
        $sql = "SELECT * FROM post WHERE no ='".$id."'";
        $data = $this->Dbconnect->query($sql);
        $data->setFetchMode(\PDO::FETCH_OBJ);
        $satatus = $data->fetch();

        return $satatus;
    }
    public function viewAllPostForAdmin(){
        $sql = "SELECT * FROM post WHERE approved = 'yes' && commentNo is NULL ";
        $data = $this->Dbconnect->query($sql);
        $data->setFetchMode(\PDO::FETCH_OBJ);
        $satatus = $data->fetchAll();

        return $satatus;
    }
    public function viewAllPendingRequestPostForAdmin(){
        $sql = "SELECT * FROM post WHERE approved = 'no' && commentNo is NULL ";
        $data = $this->Dbconnect->query($sql);
        $data->setFetchMode(\PDO::FETCH_OBJ);
        $satatus = $data->fetchAll();

        return $satatus;
    }
    public function viewPostComment($postNo){
        $sql = "SELECT * FROM post where commentNo = '".$postNo."' ";
        $data = $this->Dbconnect->query($sql);
        $data->setFetchMode(\PDO::FETCH_OBJ);
        $satatus = $data->fetchAll();
        return $satatus;
    }
    public function viewNoticeByid($id){
        $sql = "SELECT * FROM notice where no = '".$id."' ";
        $data = $this->Dbconnect->query($sql);
        $data->setFetchMode(\PDO::FETCH_OBJ);
        $satatus = $data->fetch();
        return $satatus;
    }
    public function bookDataCollect($id){
        $sql = "SELECT * FROM book_details where book_no = '".$id."' ";
        $data = $this->Dbconnect->query($sql);
        $data->setFetchMode(\PDO::FETCH_OBJ);
        $satatus = $data->fetch();
        return $satatus;
    }
    public function viewAllBooksBymail($Ademail){
        $sql = "SELECT * FROM book_details where email = '".$Ademail."' ";
        $data = $this->Dbconnect->query($sql);
        $data->setFetchMode(\PDO::FETCH_OBJ);
        $satatus = $data->fetchAll();
        return $satatus;
    }
    public function viewAllBooksForUsers(){
        $sql = "SELECT * FROM book_details";
        $data = $this->Dbconnect->query($sql);
        $data->setFetchMode(\PDO::FETCH_OBJ);
        $satatus = $data->fetchAll();
        return $satatus;
    }
    public function CheckBookRefferNo($id){
        $sql = "SELECT * FROM book_details where reffer_no = '".$id."' ";
        $data = $this->Dbconnect->query($sql);
        $data->setFetchMode(\PDO::FETCH_OBJ);
        $satatus = $data->fetch();
        return $satatus;
    }
    public function checkCartIsStatus($id,$email){
        $sql = "SELECT * FROM cart where email = '".$email."' && status = '0' && reffer_no = '".$id."' ";
        $data = $this->Dbconnect->query($sql);
        $data->setFetchMode(\PDO::FETCH_OBJ);
        $satatus = $data->fetch();
        return $satatus;
    }
    public function viewSellerBuyersTotalInfo($buyers_id,$sellers_id){
        $sql = "SELECT * FROM chat where users_id = '".$buyers_id."' &&  owners_id = '".$sellers_id."' ORDER BY no DESC";
        $data = $this->Dbconnect->query($sql);
        $data->setFetchMode(\PDO::FETCH_OBJ);
        $satatus = $data->fetchAll();

        $updates = "update chat set messageRead = 'seen' where users_id = '".$buyers_id."' &&  owners_id = '".$sellers_id."'";
        $this->Dbconnect->exec($updates);

        return $satatus;
    }
    public function viewSellerBuyersTotalInfoS($buyers_id,$sellers_id){
        $sql = "SELECT * FROM chat where users_id = '".$buyers_id."' &&  owners_id = '".$sellers_id."' ORDER BY no DESC";
        $data = $this->Dbconnect->query($sql);
        $data->setFetchMode(\PDO::FETCH_OBJ);
        $satatus = $data->fetchAll();

        $update = "update chat set message = 'seen' where users_id = '".$buyers_id."' &&  owners_id = '".$sellers_id."'";
        $this->Dbconnect->exec($update);

        return $satatus;
    }
    public function ratingValueUpdate($buyers_id,$sellers_id){
        $update = "update product_confirm set rating = '".$sellers_id."' where no = '".$buyers_id."'";
        $this->Dbconnect->exec($update);
    }
    public function upadteCartDetailsViaCartNo($cart_no){
        $update = "update cart set status = 'success' where cart_no = '".$cart_no."'";
        $this->Dbconnect->exec($update);
    }
    public function usercheckactive($user_id){
        $re_check = 'yes';
        $array=array($re_check);
        $sql="update  users set checkActive=? WHERE no='".$user_id."'";
        $data= $this->Dbconnect->prepare($sql);
        $status=$data->execute($array);
        return $status;
    }
    public function updateMemberProfile($name,$email,$address,$pnumber,$cname,$state,$shop_name)
    {
        $array = array($name,$address,$pnumber,$cname,$state,$shop_name);
        $sqls = "update shop_owner set name=?,address=?,pnumber=?,city=?,state=?,shop_name=? WHERE  email='" . $email . "'";
        $data = $this->Dbconnect->prepare($sqls);
        $status = $data->execute($array);

        $sqls2 = "update users set name='".$name."' WHERE  email='" . $email . "'";
        $this->Dbconnect->exec($sqls2);

        return $status;
    }

    public function updateAdminProfile($id,$name,$email)
    {
        $array = array($name,$email);
        $sqls = "update users set name=?,email=? WHERE  no='" . $id . "'";
        $data = $this->Dbconnect->prepare($sqls);
        $status = $data->execute($array);
        return $status;
    }
    public function updatebookDetailsviaemail($book_name,$writer_name,$title,$email,$new_image,$price,$book_no)
    {
        $array = array($book_name,$writer_name,$title,$new_image,$price);
        $sqls = "update book_details set book_name=?,writer_name=?,title=?,image=?,price=? WHERE  reffer_no='" .$book_no. "'";
        $data = $this->Dbconnect->prepare($sqls);
        $status = $data->execute($array);
        return $status;
    }
    public function updatebookDetailsviaemailImages($book_name,$writer_name,$title,$email,$new_image,$price,$book_no)
    {
        $array = array($book_name,$writer_name,$title,$new_image,$price);
        $sqls = "update book_details set book_name=?,writer_name=?,title=?,image=?,price=? WHERE  reffer_no='" .$book_no. "'";
        $data = $this->Dbconnect->prepare($sqls);
        $status = $data->execute($array);
        return $status;
    }
    public function userActivaeYes($activate,$id)
    {

        $array = array($activate);
        $sqls = "update users set checkActive=? WHERE  no='" . $id . "'";
        $data = $this->Dbconnect->prepare($sqls);
        $status = $data->execute($array);
        return $status;
    }

    public function updateUsersProfile($name,$email,$address,$pnumber,$cname,$state)
    {
        $array = array($name,$address,$pnumber,$cname,$state);
        $sqls = "update user_details set name=?,address=?,pnumber=?,city=?,state=? WHERE  email='" . $email . "'";
        $data = $this->Dbconnect->prepare($sqls);
        $status = $data->execute($array);

        $sqls2 = "update users set name='".$name."' WHERE  email='" . $email . "'";
        $this->Dbconnect->exec($sqls2);

        return $status;
    }

     public function Change_member_photo($id,$image)
    {
        $array = array($image);
        $sqls = "update users set image=? WHERE  no='" . $id . "'";
        $data = $this->Dbconnect->prepare($sqls);
        $status = $data->execute($array);
        return $status;
    }
    public function UserDataMoveToTrash($id)
    {
        $satatus='delete';
        $array = array($satatus);
        $sqls = "update users set 	checkActive=? WHERE  no='" . $id . "'";
        $data = $this->Dbconnect->prepare($sqls);
        $status = $data->execute($array);
        return $status;
    }
     public function updateNotice($noticeInfo,$id)
    {
        $array = array($noticeInfo);
        $sqls = "update notice set notice=? WHERE  no='" . $id . "'";
        $data = $this->Dbconnect->prepare($sqls);
        $status = $data->execute($array);
        return $status;
    }

    public function deleteNotice($id)
    {
        $sql = "delete from notice WHERE no = '".$id."'";
        $data = $this->Dbconnect->exec($sql);
        return $data;
    }
    public function DeleteBookDetails($id)
    {
        $sql = "delete from book_details WHERE book_no = '".$id."'";
        $data = $this->Dbconnect->exec($sql);
        return $data;
    }
    public function deleteItemNeedCartValue($id)
    {
        $sql = "delete from cart WHERE cart_no = '".$id."'";
        $data = $this->Dbconnect->exec($sql);
        return $data;
    }
    public function usercheckactiveDelete($user_id){
        $sql=" delete from users WHERE no='".$user_id."'";
        $data= $this->Dbconnect->exec($sql);
        return $data;
    }
    public function noticeDelete($noticeNo){
        $sql=" delete from notice WHERE no='".$noticeNo."'";
        $data= $this->Dbconnect->exec($sql);
        return $data;
    }
    public function managePostDelete($postNo){
        $sql=" delete from post WHERE commentNo ='".$postNo."' || no='".$postNo."'";
        $data= $this->Dbconnect->exec($sql);
        return $data;
    }
    public function AdminSinglePendingPostRequest($postNo){
        $sql=" update post set approved = 'yes' WHERE no='".$postNo."'";
        $data= $this->Dbconnect->exec($sql);
        return $data;
    }
    public function addNotice($fname,$notice,$notice_title){
        $dataArray=array($fname,$notice,$notice_title);
        $sql="insert into notice(name,notice,title,date)VALUES (?,?,?,now())";
        $sth=$this->Dbconnect->prepare($sql);
        $status=$sth->execute($dataArray);
        return $status;
    }
    public function insertCartValue($name,$email,$reffer_no,$owner_email,$book_name,$writer_name,$price,$image,$item){
        $dataArray=array($name,$email,$reffer_no,$owner_email,$book_name,$writer_name,$price,$image,$item);
        $sql="insert into cart(name,email,reffer_no,owner_email,book_name,writer_name,book_price,image,item)VALUES (?,?,?,?,?,?,?,?,?)";
        $sth=$this->Dbconnect->prepare($sql);
        $status=$sth->execute($dataArray);
        return $status;
    }
    public function insertBookDetails($email,$book_name,$writer_name,$title,$destinationFile,$book_no,$price){
        $dataArray=array($email,$book_name,$writer_name,$title,$destinationFile,$book_no,$price);
        $sql="insert into book_details(email,book_name,writer_name,title,image,reffer_no,price)VALUES (?,?,?,?,?,?,?)";
        $sth=$this->Dbconnect->prepare($sql);
        $status=$sth->execute($dataArray);
        return $status;
    }
    public function updateInsertMemberProfile($name,$email,$address,$pnumber,$cname,$state,$shop_name){
        $dataArray=array($name,$email,$address,$pnumber,$cname,$state,$shop_name);
        $sql="insert into shop_owner(name,email,address,pnumber,city,state,shop_name)VALUES (?,?,?,?,?,?,?)";
        $sth=$this->Dbconnect->prepare($sql);
        $status=$sth->execute($dataArray);
        return $status;
    } public function updateInsertMemberUserProfile($name,$email,$address,$pnumber,$cname,$state){
        $dataArray=array($name,$email,$address,$pnumber,$cname,$state);
        $sql="insert into user_details(name,email,address,pnumber,city,state)VALUES (?,?,?,?,?,?)";
        $sth=$this->Dbconnect->prepare($sql);
        $status=$sth->execute($dataArray);
        return $status;
    }
    public function textareaPostSave($user_id,$name,$post,$image,$position,$post_title){
        $dataArray=array($user_id,$name,$post,$image,$position,$post_title);
        $sql="insert into post(user_id,name,post,image,position,title,date,time)VALUES (?,?,?,?,?,?,now(),now())";
        $sth=$this->Dbconnect->prepare($sql);
        $status=$sth->execute($dataArray);
        return $status;
    }
    public function confirmProductInformation($user_id,$parent_id,$confirm_name,$address,$item_need,$pnumber,$parents_ids,$unitsofproduct){
        $dataArray=array($user_id,$parent_id,$confirm_name,$address,$item_need,$pnumber,$parents_ids,$unitsofproduct);
        $sql="insert into product_confirm(user_id_From,user_id_To,name,address,item,pnumber,product,units,date,time)VALUES (?,?,?,?,?,?,?,?,now(),now())";
        $sth=$this->Dbconnect->prepare($sql);
        $status=$sth->execute($dataArray);
        return $status;
    }
    public function insertMessageForChat($buyers_id,$sellers_id,$buyers_name,$sellers_name,$chat_message){
        $dataArray=array($buyers_id,$sellers_id,$buyers_name,$sellers_name,$chat_message);
        $sql="insert into chat(users_id,owners_id,users_name,owners_name,message_from,date,time)VALUES (?,?,?,?,?,now(),now())";
        $sth=$this->Dbconnect->prepare($sql);
        $status=$sth->execute($dataArray);
        $update = "update chat set messageRead = 'seen' where users_id = '".$buyers_id."' &&  owners_id = '".$sellers_id."'";
        $this->Dbconnect->exec($update);
        return $status;
    }
    public function insertMessageForChatSellers($buyers_id,$sellers_id,$buyers_name,$sellers_name,$chat_message){
        $data=array($buyers_id,$sellers_id,$buyers_name,$sellers_name,$chat_message);
        $sql="insert into chat(users_id,owners_id,users_name,owners_name,message_to,date,time)VALUES (?,?,?,?,?,now(),now())";
        $sth=$this->Dbconnect->prepare($sql);
        $status=$sth->execute($data);
        $update = "update chat set message = 'seen' where users_id = '".$buyers_id."' &&  owners_id = '".$sellers_id."'";
        $this->Dbconnect->exec($update);
        return $status;
    }
    public function insertComment($user_id,$name,$post,$commentNo,$approved){
        $dataArray=array($user_id,$name,$post,$commentNo,$approved);
        $sql="insert into post(user_id,name,post,date,time,commentNo,approved)VALUES (?,?,?,now(),now(),?,?)";
        $sth=$this->Dbconnect->prepare($sql);
        $status=$sth->execute($dataArray);
        return $status;
    }
    public function postUpdateDataCollectviaUserId($user_id,$post){
        $dataArray=array($post);
        $sql="update  post set post=? WHERE no ='".$user_id."'";
        $data= $this->Dbconnect->prepare($sql);
        $status=$data->execute($dataArray);
        return $status;
    }
    public function showAlertonMessage($sellers_id){
        $message = "unseen";
        $sql = "select users_id, message from chat where  owners_id = '".$sellers_id."' &&  message='".$message."'";
        $data = $this->Dbconnect->query($sql);
        $data->setFetchMode(\PDO::FETCH_OBJ);
        $status = $data->fetchAll();

        return $status;
    }
    public function showAlertonMessageforbuyers($id){
        $message = "unseen";
        $sql = "select owners_id, messageRead from chat where users_id = '".$id."' && messageRead='".$message."'";
        $data = $this->Dbconnect->query($sql);
        $data->setFetchMode(\PDO::FETCH_OBJ);
        $status = $data->fetchAll();

        return $status;
    }

}