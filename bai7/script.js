var danhSachPhim = [
    {
        id:1,
        ten:"Cảnh sát trưởng Labrado",
        thoiLuong:20,
        banner: "../anh/h11",
        trailer:"../anh/hoara.mp4"
    },
    {
        id:2,
        ten:"Zootopia",
        thoiLuong:15,
        banner: "../anh/h12",
        trailer:"../anh/xtc.mp4"
    },
    {
        id:3,
        ten:"chimsau",
        thoiLuong:2,
        banner: "../anh/h13",
        trailer:"../anh/chimsau.mp4"
    },
    {
        id:4,
        ten:"nghenhutinhyeu",
        thoiLuong:4,
        banner: "../anh/h14",
        trailer:"../anh/nghenhutinhyeu.mp4"
    },
    {
        id:5,
        ten:"nghiemtong",
        thoiLuong:5,
        banner: "../anh/h15",
        trailer:"../anh/nghiemtong.mp4"
    },
    {
        id:6,
        ten:"vianhdaucobiet",
        thoiLuong:15,
        banner: "../anh/h16",
        trailer:"../anh/vianhdaucobiet.mp4"
    },
    {
        id:7,
        ten:"Zootopia",
        thoiLuong:15,
        banner: "../anh/h17",
        trailer:"../anh/wrongtime.mp4"
    }
]







function xemTrailer(){
    document.getElementsByClassName("banner")[1].style="display:block";
    document.getElementsByClassName("banner")[0].style="display:none";
}
function chonPhim(id){
    for(var i = 0; i < danhSachPhim.length; i++){
        if(danhSachPhim[i].id==id){
            var banner = danhSachPhim[i].banner;
            var trailer = danhSachPhim[i].trailer;
            document.getElementsByClassName("banner")[0].src=banner + ".png";
            var videoTag = document.getElementsByClassName("video-banner")[0];
            videoTag.src = trailer;
            videoTag.load();
            xemTrailer();
        }
    }
}