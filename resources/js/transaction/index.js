let listProduct = [];
let listTransactionProduct = [];
let totalPrice = 0;

async function getListProduct(){
    const res = await axios.get(listProductUrl);
    listProduct = res.data;

    setSelectChange();
    setButtonConfirm();
    reset();
}

function setSelectList(){
    const selectListProduct = listProduct.filter(product => listTransactionProduct.find(tproduct => tproduct.id === product.id) === undefined);
    const selectProduct = $('#select-product');

    selectProduct.html('');
    selectProduct.append(`<option>Tambah Produk</option>`);

    selectListProduct.forEach(product => {
        if(product.stock < 1) return;
        selectProduct.append(`<option value="${product.id}">${product.name}</option>`);
    });
    selectListProduct.forEach(product => {
        if(product.stock > 0) return;
        selectProduct.append(`<option value="${product.id}">${product.name} (Kosong)</option>`);
    });
}

function setSelectChange(){
    $('#select-product').change(function (e){
        const id = parseInt(this.value);
        const product = getProductById(id);

        if(product.stock < 1){
            Swal.fire({
                title: 'Kesalahan',
                text: 'Tidak bisa menambahkan produk dengan stok kosong!',
                icon: 'error',
            });
            return reset();
        }

        listTransactionProduct.push({ id, stock: 0 });
        reset();
    });
}

function setTableTransaction(){
    $('tbody').html('');
    listTransactionProduct.forEach((tproduct, index) => {
        const product = getProductById(tproduct.id);
        // $('tbody').append(`
        //     <tr>
        //         <td>${index + 1}.</td>
        //         <td>${product.name}</td>
        //         <td>${product.price}</td>
        //         <td>
        //             <input product-id="${product.id}" class="input-stock input bg-transparent w-full" type="number" min="0" max="${product.stock}" value="${tproduct.stock}">
        //         </td>
        //         <td>${rupiah(product.price * tproduct.stock)}</td>
        //         <td>
        //             <button product-id="${product.id}" class="btn-delete"><i class="fa fa-trash text-red-500"></i></button>
        //         </td>
        //     </tr>
        // `)

        $('tbody').append(`
            <tr>
                <td>${product.name}</td>
                <td>
                    <input product-id="${product.id}" class="input-stock input bg-transparent w-full" type="number" min="0" max="${product.stock}" value="${tproduct.stock}">
                </td>
                <td>${rupiah(product.price)}</td>
                <td>${rupiah(product.price * tproduct.stock)}</td>
                <td>
                    <button product-id="${product.id}" class="btn-delete"><i class="fa fa-x text-red-500"></i></button>
                </td>
            </tr>
        `)
    })
    setTotalPrice();
    setButtonDelete();
    setInputStock();
}

function setButtonDelete(){
    $('.btn-delete').click(function (e){
        const id = parseInt($(this).attr('product-id'));
        listTransactionProduct = listTransactionProduct.filter(product => product.id !== id);
        reset();
    });
}

function setInputStock(){
    $('.input-stock').change(function (e){
        let value = parseInt($(this).val());
        if(isNaN(value)){
            reset();
            return;
        }

        const id = parseInt($(this).attr('product-id'));
        const product = getProductById(id);

        if(value > product.stock){
            value = product.stock;
        }

        const index = listTransactionProduct.findIndex(product => product.id === id);
        listTransactionProduct[index].stock = value;
        reset();
    });
}

function setTotalPrice(){
    totalPrice = 0;
    listTransactionProduct.forEach((tproduct, index) => {
        const product = getProductById(tproduct.id);
        totalPrice += product.price * tproduct.stock;
    });
    $('#total-price').html(rupiah(totalPrice))
}

function setListTransactionPrice(){
    listTransactionProduct = listTransactionProduct.map((tproduct, index) => {
        const product = getProductById(tproduct.id);
        tproduct.subtotal = product.price * tproduct.stock;
        return tproduct;
    })
}

function setButtonConfirm(){
    $('#btn-confirm').click(async function (e){
        const selectCustomer = $('#select-customer');

        if(selectCustomer.val() === '') return Swal.fire({
            title: 'Peringatan',
            text: 'Silahkan pilih pelanggan terlebih dahulu!',
            icon: 'warning'
        });
        if(listTransactionProduct.length < 1) return Swal.fire({
            title: 'Kesalahan',
            text: 'Transaksi tidak boleh kosong!',
            icon: 'error',
        });

        const { isConfirmed } = await Swal.fire({
            title: 'Peringatan',
            text: 'Apakah kamu yakin transaksi sudah benar?',
            icon: 'warning',
            showCancelButton: true,
            showConfirmButton: true
        });
        if(!isConfirmed) return;

        setListTransactionPrice();

        const products = listTransactionProduct.map(product => {
            return {
                product_id: product.id,
                stock: product.stock,
                subtotal: product.subtotal
            }
        });

        await axios.post(storeTransactionUrl, {
            price_total: totalPrice,
            customer_id: parseInt(selectCustomer.val()),
            products
        });

        location.href = transactionHistoryUrl;
    });
}

function reset(){
    setSelectList();
    setTableTransaction();
}

function getProductById(id){
    return listProduct.find(product => product.id === id);
}
getListProduct();
