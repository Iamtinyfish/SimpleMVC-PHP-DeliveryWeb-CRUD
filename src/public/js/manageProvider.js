document.querySelector('.statisticBtn').addEventListener('click', statistic);
document.querySelector('.addProviderBtn').addEventListener('click', addProvider);
addEventBtn('detailProviderBtn',detailProvider);
addEventBtn('editProviderBtn',editProvider)
addEventBtn('deleteProviderBtn',deleteProvider)

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
    XMLHttp.open('GET',`http://tinyfish.me/admin/manage-provider/statistic`,true);
    XMLHttp.send();
}

function statisticForm(data) {
    let statisticTableHTML = '';
    let i = 1;
    for (let provider of data) {
        statisticTableHTML += `<tr><th scope="row">${i}</th>
                               <td>${provider['provider_id']}</td>
                               <td>${provider['provider_name']}</td>
                               <td>${provider['all']}</td>
                               <td>${provider['success']}</td></tr>`;
        i++;
    }

    let html = `
        <section class='popup container-fluid justify-content-center'>
            <div class='bg-white container-fluid' style='width:800px;margin-top:4%'>
                <div class='d-flex justify-content-between text-white bg-primary' 
                    style='margin-left:-0.8rem;margin-right:-0.8rem;'>
                    <h2 class='ps-3'>
                        10 nhà cung cấp hoàn thành nhiều đơn hàng nhất
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
                                <th scope="col">Số đơn đã nhận</th>
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
    phone: '',
    address: '',
    email: '',
    note: '',
    account: {
        username: '',
        password: ''
    }
};

function addProvider() {
    providerForm(emptyProviderObject,false);
    document.querySelector('.addBtn').addEventListener('click',() => {
        const form = document.querySelector('.providerForm');
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
        XMLHttp.open('POST','http://tinyfish.me/admin/manage-provider/add',true);
        XMLHttp.setRequestHeader("Content-Type", "application/json;charset=UTF-8");
        XMLHttp.send(data);
    });
}

function detailProvider(id) {
    let XMLHttp = new XMLHttpRequest();
    XMLHttp.onreadystatechange = function() {
        if (this.readyState === 4 && this.status === 200) {
            let Provider = JSON.parse(this.responseText);
            providerForm(Provider);
        }
    }
    XMLHttp.open('GET',`http://tinyfish.me/admin/manage-provider/detail?id=${id}`,true);
    XMLHttp.send();
}

function editProvider(id) {
    let XMLHttp = new XMLHttpRequest();
    XMLHttp.onreadystatechange = function() {
        if (this.readyState === 4 && this.status === 200) {
            let Provider = JSON.parse(this.responseText);
            providerForm(Provider,false);
            document.querySelector('.updateBtn').addEventListener('click', updateProviderBtnAction);
        }
    }
    XMLHttp.open('GET',`http://tinyfish.me/admin/manage-provider/detail?id=${id}`,true);
    XMLHttp.send();
}

function updateProviderBtnAction() {
    const form = document.querySelector('.providerForm');
    const data = JSON.stringify(Object.fromEntries(new FormData(form).entries()));
    let XMLHttp = new XMLHttpRequest();
    XMLHttp.onreadystatechange = function() {
        if (this.readyState === 4 && this.status === 200) {
            let status = JSON.parse(this.responseText);
            if (status === true) alert('Cập nhật thành công!');
            else alert('Cập nhật thất bại!');
        }
    }
    XMLHttp.open('POST','http://tinyfish.me/admin/manage-provider/update',true);
    XMLHttp.setRequestHeader("Content-Type", "application/json;charset=UTF-8");
    XMLHttp.send(data);
}

function deleteProvider(id) {
    const bgColorClass = 'bg-danger';
    let html = `
        <section class='popup container-fluid justify-content-center'>
            <div class='bg-white container-fluid' style='width:500px;margin-top:20%'>
                <div class='d-flex justify-content-between text-white ${bgColorClass}' 
                    style='margin-left:-0.8rem;margin-right:-0.8rem;'>
                    <h2 class='ps-3'>
                         Xóa Provider
                    </h2>
                    <button type='button' class='btn text-white pt-2 pr-3 removePopupBtn'>
                        <i class='fas fa-times'></i>
                    </button>
                </div>
                <div class='d-flex flex-row flex-wrap align-items-center py-3 text-center'>
                    Bạn có chắc muốn xóa nhà cung cấp này?
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
                    alert('Đã xóa nhà cung cấp!');
                    document.getElementById(id).remove();
                }
                else alert('Lỗi: không thể xóa nhà cung cấp! ');
            }
        }
        XMLHttp.open('GET',`http://tinyfish.me/admin/manage-provider/delete?id=${id}`,true);
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

function providerForm(provider,isReadonly = true) {
    let title;
    let bgColorClass;
    let readonlyAttr = '';
    let readonlyClass = '';
    let btnHTML;

    if (isReadonly) {
        title = 'Thông tin chi tiết nhà cung cấp';
        bgColorClass = 'bg-info';
        readonlyAttr = 'readonly';
        readonlyClass = '-plaintext';
        btnHTML = `<button type='button' class='btn btn-info text-white removePopupBtn'>OK</button>`;
    } else {
        if (provider.id !== '') {
            title = 'Chỉnh sửa thông tin nhà cung cấp';
            bgColorClass = 'bg-warning';
            btnHTML = `<button type='button' class='btn btn-warning text-white updateBtn'>Cập nhật</button>
                    <button type='button' class='btn btn-danger removePopupBtn'>Hủy</button>`;
        }  else {
            title = 'Thêm nhà cung cấp';
            bgColorClass = 'bg-primary';
            btnHTML = `<button type='button' class='btn btn-primary addBtn'>Thêm</button>
                        <button type='reset' class='btn btn-secondary'>Reset</button>
                        <button type='button' class='btn btn-danger removePopupBtn'>Thoát</button>`;
        }
    }

    let html = `
        <section class='popup container-fluid justify-content-center'>
            <div class='bg-white container-fluid' style='width:550px;margin-top:5%'>
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
                    <form class='ms-3 providerForm' style='width:500px;'>
                        ${
                        (provider.id !== '') ?
                            `<div class='row mb-3'>
                            <label class='col-sm-4 col-form-label'><b>ID:</b></label>
                            <div class='col-sm-8'>
                                <input readonly value='${provider.id}' type='text' class='form-control-plaintext' name='id' required>
                            </div>
                        </div>` : ''
                        }
                        <div class='row mb-3'>
                            <label class='col-sm-4 col-form-label'><b>Họ và tên:</b></label>
                            <div class='col-sm-8'>
                                <input ${readonlyAttr} value='${provider.name}' type='text' class='form-control${readonlyClass}' name='name' required>
                            </div>
                        </div>
                        <div class='row mb-3'>
                            <label class='col-sm-4 col-form-label'><b>Tên tài khoản:</b></label>
                            <div class='col-sm-8'>
                                <input ${(provider.account.username !== '') ? 'readonly' : ''} value='${provider.account.username}' type='text' class='form-control${(provider.account.username !== '') ? '-plaintext' : ''}' name='username' required>
                            </div>
                        </div>
                        ${
                        (provider.id === '') ? 
                            `<div class='row mb-3'>
                                <label for='password' class='col-sm-4 col-form-label'><b>Mật khẩu:</b></label>
                                <div id='password' class='input-group col-sm-8' style='width:349px;'>
                                    <input name='password' type='password' class='form-control' required>
                                    <span class='input-group-text bg-white '><i class='fas fa-eye text-warning'></i></span>
                                </div>
                            </div>` : ''
                        }
                        <div class='row mb-3'>
                            <label class='col-sm-4 col-form-label'><b>Số điện thoại:</b></label>
                            <div class='col-sm-8'>
                                <input ${readonlyAttr} value='${provider.phone}' type='tel' class='form-control${readonlyClass}' name='phone' required>
                            </div>
                        </div>
                        <div class='row mb-3'>
                            <label class='col-sm-4 col-form-label'><b>Địa chỉ:</b></label>
                            <div class='col-sm-8'>
                                <input ${readonlyAttr} value='${provider.address}' type='text' class='form-control${readonlyClass}' name='address' required>
                            </div>
                        </div>
                        <div class='row mb-3'>
                            <label class='col-sm-4 col-form-label'><b>Email:</b></label>
                            <div class='col-sm-8'>
                                 <input ${readonlyAttr} value='${provider.email}' type='email' class='form-control${readonlyClass}' name='email' required>
                            </div>
                        </div>
                        <div class='row mb-3'>
                            <label class='col-sm-4 col-form-label'><b>Ghi chú:</b></label>
                            <div class='col-sm-8'>
                                 <input ${readonlyAttr} value='${provider.note}' type='text' class='form-control${readonlyClass}' name='note' required>
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
