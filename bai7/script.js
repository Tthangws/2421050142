var danhSachPhim = [
    {
        id:1,
        ten:"Cảnh sát trưởng Labrado",
        thoiLuong:20,
        banner: "../anh/banner",
        trailer:"https://www.youtube.com/embed/0OWK5yy-7lM?si=y7S3iLlSwGd98Zhu"
    },
    {
        id:2,
        ten:"Zootopia",
        thoiLuong:15,
        banner: "../anh/h11",
        trailer:"https://www.youtube.com/embed/0OWK5yy-7lM?si=y7S3iLlSwGd98Zhu"
    }
]







function xemTrailer(){
                    document.getElementsByClassName("banner")[1].style="display:block";
                    document.getElementsByClassName("banner")[0].style="display:none";
                }

function chonPhim(id){
    var phimDangChon = document.getElementsByClassName("banner")[0];
    var phimDangChon = document.getElementsByClassName("banner")[0];

    for(var i = 0; i < danhSachPhim.length; i++){
        if(danhSachPhim[i].id==id){
            banner = danhSachPhim[i].banner;
            trailer = danhSachPhim[i].trailer;
        }
    }
}