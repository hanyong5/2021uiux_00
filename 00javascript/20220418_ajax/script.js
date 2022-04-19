// $.ajax({
//     url:'https://dapi.kakao.com/v2/search/web',
//     type:'GET',
//     dataType:'json',
//     data:{query:"코로나"},
//     beforeSend:onBefore,
//     success:onSuccess,
//     error:onError
// });

// function onBefore(xhr){
//     xhr.setRequestHeader(
//         'Authorization', 'KakaoAK 6e4d4a95852ce2aaec202c0283238b63'
//     )
// }

// function onSuccess(v){
//     console.log(v)

// }
// function onError(xhr,status,error){
//     console.log(xhr,status,error)
// }




$(".search-form").submit(onSubmit)
function onSubmit(e) {
    e.preventDefault();
    let query = $(this).find("input[name='query']").val().trim();


    axios
        .get(
            'https://dapi.kakao.com/v2/search/web?size=50',
            {
                params: { query: query },
                headers: { Authorization: 'KakaoAK 6e4d4a95852ce2aaec202c0283238b63' }
            }
        )
        .then(onResult)
        .catch(onError);

}



function onResult(v){
    console.log(v.data);
    let r = v.data;
    let rDoc = r.documents;
    let txt = ""

    // rDoc.forEach(function(item,index){})
    rDoc.forEach(function(item,index){
        txt += `<div class="col-6 col-md-3 mb-3">
                   <h5><a href="${item.url}" target="_blank"> ${item.title}</a></h5>
                   <p>${item.contents}</p>
                </div>`
        
    })

    $(".lists").html(txt)

}

function onError(err){
    console.log(err);
}
