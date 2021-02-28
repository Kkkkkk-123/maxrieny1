function fun(res) {
    let s = res.g;
    let box = document.querySelector('#box');
    let str = '';

    function fun1(c) {
        if (c) {
            c.forEach(item => {
                str += `
            <p class="d">${item.q}</p>`;
            })
            box.innerHTML = str;
            let d = document.querySelectorAll('.d');
            [...d].forEach(item => {
                item.onclick = function () {
                    word.value = item.innerHTML;
                }
                item.onmouseover = function () {
                    // [...d].forEach(item2=>{
                    //     item2.classList.remove('active');
                    // })
                    item.classList.add("active");
                }
                item.onmouseout = () => {
                    item.classList.remove('active');
                }
            })
        }
    }
    fun1(s);
}
let word = document.querySelector('#word');
let btn = document.querySelector('#btn');
let shousuo = document.querySelector('#shousuo');
word.onkeyup = function () {
    // 动态创建script标签
    box.style.display = 'block';
    let script = document.createElement('script');
    script.src =
        `https://www.baidu.com/sugrec?pre=1&p=3&ie=utf-8&json=1&prod=pc&from=pc_web&sugsid=33425,33516,33402,33344,31660,33285,33287,33338,26350,33264&wd=${word.value}&req=2&csor=1&pwd=zho&cb=fun`;
    document.body.appendChild(script);
    // 添加完成之后需要把script删除
    script.remove();
}
word.onkedown = function () {
    box.style.display = 'block';
}
shousuo.onmouseleave = function () {
    box.style.display = 'none';
}

let list = document.querySelector(".list");
let page = document.querySelector('.page');

let defaultInfo = {
    len: 20,
    num: 1
}
pAjax({
    url: '../api/getData.php',
    data: {
        start: defaultInfo.num,
        len: defaultInfo.len
    }
}).then((res) => {
    res = JSON.parse(res);
    new Pagination(page, {
        pageInfo: {
            pagenum: 1,
            pagesize: defaultInfo.len,
            total: res.total,
            totalpage: Math.ceil(res.total / defaultInfo.len)
        },
        textInfo: {
            first: '首页',
            prev: '上一页',
            list: '',
            next: '下一页',
            last: '最后一页'
        },
        change: function (num) {
            defaultInfo.num = num;
            getData();
            scrollTo(0, 0)
        }
    });
})

async function getData() {
    let res = await pAjax({
        url: '../api/getData.php',
        data: {
            start: defaultInfo.num,
            len: defaultInfo.len
        }
    });
    res = JSON.parse(res)
    renderHtml(res.list);
}

function renderHtml(data) {
    let str = '';

    data.forEach((item, index) => {
        str += ` 
        <li class="list-item">
        <div class="title">
            <ol class="breadcrumb">
                <li><a href="#">${item.cat_one_id}</a></li>
                <li><a href="#">${item.cat_two_id}</a></li>
                <li class="active">${item.cat_three_id}</li>
            </ol>
        </div>
        <div class="row">
            <div>
                <div class="thumbnail">
                    <img src="${item.goods_big_logo}"
                        alt="...">
                    <div class="caption">
                        <h3>${item.goods_name}</h3>
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
