document.querySelector('.statisticBtn').addEventListener('click', statistic);
document.querySelector('.addShipperBtn').addEventListener('click', addShipper);
addEventBtn('detailShipperBtn',detailShipper);
addEventBtn('editShipperBtn',editShipper)
addEventBtn('deleteShipperBtn',deleteShipper)

function addEventBtn(btnClass,func) {
    let btns = document.querySelectorAll('.' + btnClass)
    for (let btn of btns) {
        let id = btn.getAttribute('value');
        let handler = getHandler(id,func);
        btn.addEventListener('click', handler);
    }
}

function getHandler(id,func) {
    function handler() {
        func(id);
    }
    return handler
}

function statistic() {
    let XMLHttp = new XMLHttpRequest();
    XMLHttp.onreadystatechange = function() {
        if (this.readyState === 4 && this.status === 200) {
            let data = JSON.parse(this.responseText);
            statisticForm(data);
        }
    }
    XMLHttp.open('GET',`http://tinyfish.me/admin/manage-shipper/statistic`,true);
    XMLHttp.send();
}

function statisticForm(data) {
    let statisticTableHTML = '';
    let i = 1;
    for (let shipper of data) {
        statisticTableHTML += `<tr><th scope="row">${i}</th>
                               <td>${shipper['shipper_id']}</td>
                               <td>${shipper['shipper_name']}</td>
                               <td>${shipper['all']}</td>
                               <td>${shipper['success']}</td></tr>`;
        i++;
    }

    let html = `
        <section class='popup container-fluid justify-content-center'>
            <div class='bg-white container-fluid' style='width:800px;margin-top:4%'>
                <div class='d-flex justify-content-between text-white bg-primary' 
                    style='margin-left:-0.8rem;margin-right:-0.8rem;'>
                    <h2 class='ps-3'>
                        10 shipper hoàn thành nhiều đơn hàng nhất
                    </h2>
                    <button type='button' class='btn text-white pt-2 pr-3 removePopupBtn'>
                        <i class='fas fa-times'></i>
                    </button>
                </div>
                <div class='d-flex flex-row flex-wrap align-items-center py-3'>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">Thứ tự</th>
                                <th scope="col">ID</th>
                                <th scope="col">Tên</th>
                                <th scope="col">Số đơn hàng</th>
                                <th scope="col">Số đơn đã hoàn thành</th>
                            </tr>
                        </thead>
                        <tbody>
                            ${statisticTableHTML}
                        </tbody>
                    </table>
                    <div class='container-fluid d-flex justify-content-around pb-3'>
                        <button type='button' class='btn btn-info text-white removePopupBtn'>OK</button>
                    </div>
                </div>
            </div>
        </section>
    `;
    document.querySelector('main').appendChild(HTMLToElement(html));
    addEventRemovePopupBtn();
}

let emptyProviderObject = {
    id: '',
    name: '',
    birthday: '',
    IDCard: '',
    phone: '',
    address: '',
    vehicle: '',
    licensePlate: '',
    note: '',
    account: {
        username: '',
        password: ''
    }
};

function addShipper() {
    shipperForm(emptyShipperObject,false);
    document.querySelector('.addBtn').addEventListener('click',() => {
        const form = document.querySelector('.shipperForm');
        const data = JSON.stringify(Object.fromEntries(new FormData(form).entries()));
        let XMLHttp = new XMLHttpRequest();
        XMLHttp.onreadystatechange = function() {
            if (this.readyState === 4 && this.status === 200) {
                let status = JSON.parse(this.responseText);
                if (status === true) {
                    alert('Thêm thành công!');
                }
                else alert('Thêm thất bại!');
            }
        }
        XMLHttp.open('POST','http://tinyfish.me/admin/manage-shipper/add',true);
        XMLHttp.setRequestHeader("Content-Type", "application/json;charset=UTF-8");
        XMLHttp.send(data);
    });
}

function detailShipper(id) {
    let XMLHttp = new XMLHttpRequest();
    XMLHttp.onreadystatechange = function() {
        if (this.readyState === 4 && this.status === 200) {
            let shipper = JSON.parse(this.responseText);
            shipperForm(shipper);
        }
    }
    XMLHttp.open('GET',`http://tinyfish.me/admin/manage-shipper/detail?id=${id}`,true);
    XMLHttp.send();
}

function editShipper(id) {
    let XMLHttp = new XMLHttpRequest();
    XMLHttp.onreadystatechange = function() {
        if (this.readyState === 4 && this.status === 200) {
            let shipper = JSON.parse(this.responseText);
            shipperForm(shipper,false);
            document.querySelector('.updateBtn').addEventListener('click', updateShipperBtnAction);
        }
    }
    XMLHttp.open('GET',`http://tinyfish.me/admin/manage-shipper/detail?id=${id}`,true);
    XMLHttp.send();
}

function updateShipperBtnAction() {
    const form = document.querySelector('.shipperForm');
    const data = JSON.stringify(Object.fromEntries(new FormData(form).entries()));
    let XMLHttp = new XMLHttpRequest();
    XMLHttp.onreadystatechange = function() {
        if (this.readyState === 4 && this.status === 200) {
            let status = JSON.parse(this.responseText);
            if (status === true) alert('Cập nhật thành công!');
            else alert('Cập nhật thất bại!');
        }
    }
    XMLHttp.open('POST','http://tinyfish.me/admin/manage-shipper/update',true);
    XMLHttp.setRequestHeader("Content-Type", "application/json;charset=UTF-8");
    XMLHttp.send(data);
}

function deleteShipper(id) {
    const bgColorClass = 'bg-danger';
    let html = `
        <section class='popup container-fluid justify-content-center'>
            <div class='bg-white container-fluid' style='width:500px;margin-top:20%'>
                <div class='d-flex justify-content-between text-white ${bgColorClass}' 
                    style='margin-left:-0.8rem;margin-right:-0.8rem;'>
                    <h2 class='ps-3'>
                         Xóa shipper
                    </h2>
                    <button type='button' class='btn text-white pt-2 pr-3 removePopupBtn'>
                        <i class='fas fa-times'></i>
                    </button>
                </div>
                <div class='d-flex flex-row flex-wrap align-items-center py-3 text-center'>
                    Bạn có chắc muốn xóa shipper này?
                </div>
                <div class='container-fluid d-flex justify-content-around pb-3'>
                    <button type='button' class='btn btn-success text-white deleteBtn'>Có</button>
                    <button type='button' class='btn btn-danger removePopupBtn'>Không</button>
                </div>
            </div>
        </section>
    `;
    document.querySelector('main').appendChild(HTMLToElement(html));
    addEventRemovePopupBtn();
    document.querySelector('.deleteBtn').addEventListener('click',() => {
        let XMLHttp = new XMLHttpRequest();
        XMLHttp.onreadystatechange = function() {
            if (this.readyState === 4 && this.status === 200) {
                let status = JSON.parse(this.responseText);
                if (status === true) {
                    alert('Đã xóa shipper!');
                    document.getElementById(id).remove();
                }
                else alert('Lỗi: không thể xóa shipper! ');
            }
        }
        XMLHttp.open('GET',`http://tinyfish.me/admin/manage-shipper/delete?id=${id}`,true);
        XMLHttp.send();
        removePopup();
    });
}

function removePopup() {
    document.querySelector('.popup').remove();
}

function addEventRemovePopupBtn() {
    let btns = document.querySelectorAll('.removePopupBtn')
    for (let btn of btns) {
        btn.addEventListener('click', removePopup);
    }
}

function HTMLToElement(html) {
    let template = document.createElement('template');
    html = html.trim(); // Never return a text node of whitespace as the result
    template.innerHTML = html;
    return template.content.firstChild;
}

function shipperForm(shipper,isReadonly = true) {
    let title;
    let bgColorClass;
    let readonlyAttr = '';
    let readonlyClass = '';
    let btnHTML;

    if (isReadonly) {
        title = 'Thông tin chi tiết shipper';
        bgColorClass = 'bg-info';
        readonlyAttr = 'readonly';
        readonlyClass = '-plaintext';
        btnHTML = `<button type='button' class='btn btn-info text-white removePopupBtn'>OK</button>`;
    } else {
        if (shipper.id !== '') {
            title = 'Chỉnh sửa thông tin shipper';
            bgColorClass = 'bg-warning';
            btnHTML = `<button type='button' class='btn btn-warning text-white updateBtn'>Cập nhật</button>
                    <button type='button' class='btn btn-danger removePopupBtn'>Hủy</button>`;
        }  else {
            title = 'Thêm shipper';
            bgColorClass = 'bg-primary';
            btnHTML = `<button type='button' class='btn btn-primary addBtn'>Thêm</button>
                        <button type='reset' class='btn btn-secondary'>Reset</button>
                        <button type='button' class='btn btn-danger removePopupBtn'>Thoát</button>`;
        }
    }

    let html = `
        <section class='popup container-fluid justify-content-center'>
            <div class='bg-white container-fluid' style='width:480px;margin-top:1%'>
                <div class='d-flex justify-content-between text-white ${bgColorClass}' 
                    style='margin-left:-0.8rem;margin-right:-0.8rem;'>
                    <h2 class='ps-3'>
                         ${title}
                    </h2>
                    <button type='button' class='btn text-white pt-2 pr-3 removePopupBtn'>
                        <i class='fas fa-times'></i>
                    </button>
                </div>
                <div class='d-flex flex-row flex-wrap align-items-center py-3'>
                    <form class='ms-3 shipperForm' style='width:420px;'>
                        ${
                        (shipper.id !== '') ?
                            `<div class='row mb-3'>
                            <label class='col-sm-4 col-form-label'><b>ID:</b></label>
                            <div class='col-sm-8'>
                                <input readonly value='${shipper.id}' type='text' class='form-control-plaintext' name='id' required>
                            </div>
                        </div>` : ''
                        }
                        <div class='row mb-3'>
                            <label class='col-sm-4 col-form-label'><b>Họ và tên:</b></label>
                            <div class='col-sm-8'>
                                <input ${readonlyAttr} value='${shipper.name}' type='text' class='form-control${readonlyClass}' name='name' required>
                            </div>
                        </div>
                        <div class='row mb-3'>
                            <label class='col-sm-4 col-form-label'><b>Tên tài khoản:</b></label>
                            <div class='col-sm-8'>
                                <input ${(shipper.account.username !== '') ? 'readonly' : ''} value='${shipper.account.username}' type='text' class='form-control${(shipper.account.username !== '') ? '-plaintext' : ''}' name='username' required>
                            </div>
                        </div>
                        ${
                        (shipper.id === '') ? 
                            `<div class='row mb-3'>
                                <label for='password' class='col-sm-4 col-form-label'><b>Mật khẩu:</b></label>
                                <div id='password' class='input-group col-sm-8' style='width:296px;'>
                                    <input name='password' type='password' class='form-control' required>
                                    <span class='input-group-text bg-white '><i class='fas fa-eye text-warning'></i></span>
                                </div>
                            </div>` : ''
                        }
                        <div class='row mb-3'>
                            <label class='col-sm-4 col-form-label'><b>Ngày sinh:</b></label>
                            <div class='col-sm-8'>
                                <input ${readonlyAttr} value='${shipper.birthday}' type='date' class='form-control${readonlyClass}' name='birthday' required>
                            </div>
                        </div>
                        <div class='row mb-3'>
                            <label class='col-sm-4 col-form-label'><b>Số căn cước:</b> </label>
                            <div class='col-sm-8'>
                                 <input ${readonlyAttr} value='${shipper.IDCard}' type='text' class='form-control${readonlyClass}' name='IDCard' required>
                            </div>
                        </div>
                        <div class='row mb-3'>
                            <label class='col-sm-4 col-form-label'><b>Số điện thoại:</b></label>
                            <div class='col-sm-8'>
                                <input ${readonlyAttr} value='${shipper.phone}' type='tel' class='form-control${readonlyClass}' name='phone' required>
                            </div>
                        </div>
                        <div class='row mb-3'>
                            <label class='col-sm-4 col-form-label'><b>Địa chỉ:</b></label>
                            <div class='col-sm-8'>
                                <input ${readonlyAttr} value='${shipper.address}' type='text' class='form-control${readonlyClass}' name='address' required>
                            </div>
                        </div>
                        <div class='row mb-3'>
                            <label class='col-sm-4 col-form-label'><b>Phương tiện:</b></label>
                            <div class='col-sm-8'>
                                <select class='form-control${readonlyClass}' ${(isReadonly) ? 'disabled' : ''} name='vehicle'>
                                    <option ${(shipper.vehicle === 'Xe máy') ? 'selected' : ''} value='Xe máy'>Xe máy</option>
                                    <option ${(shipper.vehicle === 'Ô tô') ? 'selected' : ''} value='Ô tô'>Ô tô</option>
                                </select>
                            </div>
                        </div>
                        <div class='row mb-3'>
                            <label class='col-sm-4 col-form-label'><b>Biển số xe:</b></label>
                            <div class='col-sm-8'>
                                 <input ${readonlyAttr} value='${shipper.licensePlate}' type='text' class='form-control${readonlyClass}' name='licensePlate' required>
                            </div>
                        </div>
                        <div class='row mb-3'>
                            <label class='col-sm-4 col-form-label'><b>Ghi chú:</b></label>
                            <div class='col-sm-8'>
                                 <input ${readonlyAttr} value='${shipper.note}' type='text' class='form-control${readonlyClass}' name='note' required>
                            </div>
                        </div>
                        <div class='container-fluid d-flex justify-content-around pb-3'>
                            ${btnHTML}
                        </div>
                    </form>
                </div>
            </div>
        </section>
    `;
    document.querySelector('main').appendChild(HTMLToElement(html));
    addEventRemovePopupBtn();
}

let eyeIcon = document.querySelector('.fa-eye');
eyeIcon.addEventListener('click', () => {
    eyeIcon.classList.toggle('fa-eye-slash');
    let inPwd = eyeIcon.parentElement.previousElementSibling;
    (inPwd.type === 'password') ? inPwd.type = 'text': inPwd.type = 'password';
})
