let list = document.querySelector(".list");
let page = document.querySelector(".page");

let defaultInfo = {
    len :20,
    num:1
}

pAjax({
    url:'../getData.php',
    data:{
        start:defaultInfo.num,
        len:defaultInfo.len
    }
}).then((res) =>{
    res = JSON.parse(res);////////////////////
    new Pagination(page,{
        pageInfo:{
            pagenum:1,
            pagesize:defaultInfo.len,
            total:res.total,
            totalpage:Math.ceil(res.total / defaultInfo.len)
        },
        textInfo:{
            first:'首页',
            prev:'上一页',
            list:'',
            next:'下一页',
            last:'最后一页'
        },
        change:function(num){
            defaultInfo.num = num;
            getData();
            scrollTo(0,0)
        }
    });
})

async function getData(){
    let res = await pAjax({
        url:'../api/getData.php',
        data:{
            start:defaultInfo.num,
            len:defaultInfo.len
        }
    });
    res = JSON.parse(res);///////////////////
    renderHtml(res.list);

}

function renderHtml(data){
    let str = '';
    data.forEach((item,index)=>{
        str +=`<li class="list-item">
        <div class="title">
            <ol class="breadcrumb">
                <li><a href="#">Home</a></li>
                <li><a href="#">Library</a></li>
                <li class="active">Data</li>
            </ol>
        </div>
        <div class="row">
            <div>
                <div class="thumbnail">
                    <img src="${item.goods_big_logo}" alt="...">
                    <div class="caption">
                        <h3>${item.goods_num}</h3>
                        <div class="price">
                            <i class="glyphicon glyphicon-yen"></i>
                            <span>${item.goods_price}</span>
                        </div>
                        <p>
                            <a href="./car.html" class="btn btn-primary" role="button">查看购物车</a>
                            <a href="./detail.html?id=${item.goods_id}" class="btn btn-info" role="button">查看商品详情</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </li>`;
    })

    list.innerHTML = str;
}