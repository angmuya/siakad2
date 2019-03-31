$(function () {
  $('[data-toggle="tooltip"]').tooltip()
})

function buttonLoading(btn){
  if(btn.hasClass('disabled')){
    return;
  }
  btn.data('original-text', btn.html());
  btn.html('<span class="loading open-circle"></span> ' + btn.data('loading-text'));
  btn.addClass('disabled');
}

function buttonIdle(btn){
  if(!btn.hasClass('disabled')){
    return;
  }
  btn.html(btn.data('original-text'));
  btn.removeClass('disabled');
}

function arrayToAssociative(arr, key){
  ret = [];

  if(data == null || !Array.isArray(data) || data.length == 0){
    console.log('EMPTY ARRAY');
    return ret;
  }

  if(data[0][key] === undefined){
    console.log('KEY NOT EXIST');
    return ret;
  }

  arr.forEach((e) => {
    ret[e[key]] = e;
  });

  return ret;
}

function capFirstLetter(str){
  return str[0].toUpperCase() + str.slice(1).toLowerCase();
}

function intToDay(val){
  switch(val){
    case 0: return 'Minggu';
    case 1: return 'Senin';
    case 2: return 'Selasa';
    case 3: return 'Rabu';
    case 4: return 'Kamis';
    case 5: return "Jum'at";
    case 6: return 'Sabtu';
  }
}

function empty(str){
  if(str == null || str.trim() == ""){
    return true;
  } else {
    return false;
  }
}

MONTHS = ['Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember'];

function renderDate(date){
  return `${date.getDate()} ${MONTHS[date.getMonth()]} ${date.getFullYear()}`;
}

function findAssociative(arr, field, value){
  for(var key in arr){
    var v = arr[key];
    if(v[field] && v[field] == value){
      return v;
    }
  }
  return null;
}

function filterAssociative(arr, field, value){
  var ret = [];
  for(var key in arr){
    var v = arr[key];
    if(v[field] && v[field] == value){
      ret.push(v);
    }
  }
  return ret;
}

function convertToRupiah(angka){
  var rupiah = '';		
	var angkarev = angka.toString().split('').reverse().join('');
  for(var i = 0; i < angkarev.length; i++){
    if(i % 3 == 0) rupiah += angkarev.substr(i,3) + '.';
  }
  rupiah = rupiah.split('',rupiah.length-1).reverse().join('');
  return (rupiah.length < 1 ? '0' : rupiah);
}