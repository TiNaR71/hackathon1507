<template>
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-body">
            <div class="row mb-4">
              <div class="col-4" style="min-width: 326px">
                <label for="" class="form-control">Тип сделки</label>
                <div class="select-box" style="width: 326px;">
                  <div class="element select">Продажа</div>
                  <div class="element">Переуступка</div>
                  <div class="element">Аренда</div>
                </div>
              </div>
              <div class="col-8" style="min-width: 726px">
                <label for="" class="form-control">Тип объекта</label>
                <div class="select-box" style="width: 726px;">
                  <div class="element select">Квартира</div>
                  <div class="element">Комната</div>
                  <div class="element">Дом</div>
                  <div class="element">Дача</div>
                  <div class="element">Таунхаус</div>
                  <div class="element">ЗУ</div>
                  <div class="element">Коммерция</div>
                  <div class="element">Паркинг</div>
                </div>
              </div>
            </div>
            <div class="row mb-4">
              <div class="col-3">
                <label for="" class="form-control">Комнат</label>
                <div class="dropdown">
                  <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Не выбрано
                  </button>
                  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="#">Action</a>
                    <a class="dropdown-item" href="#">Another action</a>
                    <a class="dropdown-item" href="#">Something else here</a>
                  </div>
                </div>
              </div>
              <div class="col-3">
                <label for="" class="form-control">Стоимость, ₽</label>
                <div class="input_box">
                  <input type="number" placeholder="От">
                  <input type="number" placeholder="До">
                </div>
              </div>
              <div class="col-3">
                <label for="" class="form-control">Площадь, м²</label>
                <div class="input_box">
                  <input type="number" placeholder="От">
                  <input type="number" placeholder="До">
                </div>
              </div>
              <div class="col-3">
                <label for="" class="form-control">Район</label>
                <div class="dropdown">
                  <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Не выбрано
                  </button>
                  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="#">Action</a>
                    <a class="dropdown-item" href="#">Another action</a>
                    <a class="dropdown-item" href="#">Something else here</a>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-3">
                <label for="" class="form-control">Жилой комплекс</label>
                <div class="dropdown">
                  <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Не выбрано
                  </button>
                  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="#">Action</a>
                    <a class="dropdown-item" href="#">Another action</a>
                    <a class="dropdown-item" href="#">Something else here</a>
                  </div>
                </div>
              </div>
              <div class="col-3">
                <label for="" class="form-control">Адрес</label>
                <input type="text" class="text-input" placeholder="Введите адрес">
              </div>
              <div class="col-3">
                <label for="" class="form-control">Класс</label>
                <div class="dropdown">
                  <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Не выбрано
                  </button>
                  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="#">Action</a>
                    <a class="dropdown-item" href="#">Another action</a>
                    <a class="dropdown-item" href="#">Something else here</a>
                  </div>
                </div>
              </div>
              <div class="col-3">
                <label for="" class="form-control">Статус объекта</label>
                <div class="dropdown">
                  <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Не выбрано
                  </button>
                  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="#">Action</a>
                    <a class="dropdown-item" href="#">Another action</a>
                    <a class="dropdown-item" href="#">Something else here</a>
                  </div>
                </div>
              </div>
            </div>
            <div class="row pt-5">
              <div class="col-8">
                <div class="buttons">
                  <div class="button active">Показать XX объектов</div>
                  <div class="button">Сбросить фильтр</div>
                </div>
              </div>
              <div class="col-4">
                <div class="show-more">
                  <i class=""></i>
                  <span>Подробный фильтр</span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div id="objects">
      <span class="header">Найдено XX объектов</span>
      <div class="list row">
      <div class="object card col-4 mt-4">
        <div class="row">
          <div class="col-4 d-flex">
            <img src="https://ask-yug.com/upload/iblock/748/7485689555ea52a11ce5b0c9fb5d324d.png" alt="">
          </div>
          <div class="col-8">
            <div class="id">ID F94504</div>
            <div class="tag">Свободно</div>
            <input class="form-check-input" type="checkbox" value="">
            <label>Объект ЖК "Великолепный"</label>
            <div class="parameters">
              Общая площадь <b>49,5 м²</b>
              <ul>
                <li>Жилая площадь 47 м²</li>
                <li>Корпус 1</li>
                <li>Подъезд 1</li>
                <li>Этаж 3</li>
                <li>№ кв. 32</li>
                <li>Комн. 1</li>
              </ul>
            </div>
            <div class="price">2 531 750  ₽ </div>
          </div>
          <div class="col-12 pt-4">
            <div class="buttons">
              <div class="button bron">Забронировать</div>
              <div class="button like"><i><svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M10 16.875C10 16.875 2.1875 12.5 2.1875 7.18751C2.18766 6.24855 2.51301 5.33863 3.10824 4.61244C3.70347 3.88626 4.53183 3.38863 5.45249 3.20418C6.37315 3.01972 7.32928 3.15982 8.15832 3.60066C8.98736 4.04149 9.63814 4.75585 10 5.62227L9.99999 5.62228C10.3619 4.75585 11.0126 4.04149 11.8417 3.60066C12.6707 3.15983 13.6268 3.01973 14.5475 3.20418C15.4682 3.38863 16.2965 3.88625 16.8918 4.61244C17.487 5.33863 17.8123 6.24855 17.8125 7.18751C17.8125 12.5 10 16.875 10 16.875Z" stroke="#666565" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
              </svg></i>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="object card col-4 mt-4">
        <div class="row">
          <div class="col-4 d-flex">
            <img src="https://ask-yug.com/upload/iblock/748/7485689555ea52a11ce5b0c9fb5d324d.png" alt="">
          </div>
          <div class="col-8">
            <div class="id">ID F94504</div>
            <div class="tag">Свободно</div>
            <input class="form-check-input" type="checkbox" value="">
            <label>Объект ЖК "Великолепный"</label>
            <div class="parameters">
              Общая площадь <b>49,5 м²</b>
              <ul>
                <li>Жилая площадь 47 м²</li>
                <li>Корпус 1</li>
                <li>Подъезд 1</li>
                <li>Этаж 3</li>
                <li>№ кв. 32</li>
                <li>Комн. 1</li>
              </ul>
            </div>
            <div class="price">2 531 750  ₽ </div>
          </div>
          <div class="col-12 pt-4">
            <div class="buttons">
              <div class="button bron">Забронировать</div>
              <div class="button like"><i><svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M10 16.875C10 16.875 2.1875 12.5 2.1875 7.18751C2.18766 6.24855 2.51301 5.33863 3.10824 4.61244C3.70347 3.88626 4.53183 3.38863 5.45249 3.20418C6.37315 3.01972 7.32928 3.15982 8.15832 3.60066C8.98736 4.04149 9.63814 4.75585 10 5.62227L9.99999 5.62228C10.3619 4.75585 11.0126 4.04149 11.8417 3.60066C12.6707 3.15983 13.6268 3.01973 14.5475 3.20418C15.4682 3.38863 16.2965 3.88625 16.8918 4.61244C17.487 5.33863 17.8123 6.24855 17.8125 7.18751C17.8125 12.5 10 16.875 10 16.875Z" stroke="#666565" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
              </svg></i>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="object card col-4 mt-4">
        <div class="row">
          <div class="col-4 d-flex">
            <img src="https://ask-yug.com/upload/iblock/748/7485689555ea52a11ce5b0c9fb5d324d.png" alt="">
          </div>
          <div class="col-8">
            <div class="id">ID F94504</div>
            <div class="tag">Свободно</div>
            <input class="form-check-input" type="checkbox" value="">
            <label>Объект ЖК "Великолепный"</label>
            <div class="parameters">
              Общая площадь <b>49,5 м²</b>
              <ul>
                <li>Жилая площадь 47 м²</li>
                <li>Корпус 1</li>
                <li>Подъезд 1</li>
                <li>Этаж 3</li>
                <li>№ кв. 32</li>
                <li>Комн. 1</li>
              </ul>
            </div>
            <div class="price">2 531 750  ₽ </div>
          </div>
          <div class="col-12 pt-4">
            <div class="buttons">
              <div class="button bron">Забронировать</div>
              <div class="button like"><i><svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M10 16.875C10 16.875 2.1875 12.5 2.1875 7.18751C2.18766 6.24855 2.51301 5.33863 3.10824 4.61244C3.70347 3.88626 4.53183 3.38863 5.45249 3.20418C6.37315 3.01972 7.32928 3.15982 8.15832 3.60066C8.98736 4.04149 9.63814 4.75585 10 5.62227L9.99999 5.62228C10.3619 4.75585 11.0126 4.04149 11.8417 3.60066C12.6707 3.15983 13.6268 3.01973 14.5475 3.20418C15.4682 3.38863 16.2965 3.88625 16.8918 4.61244C17.487 5.33863 17.8123 6.24855 17.8125 7.18751C17.8125 12.5 10 16.875 10 16.875Z" stroke="#666565" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
              </svg></i>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="object card col-4 mt-4">
        <div class="row">
          <div class="col-4 d-flex">
            <img src="https://ask-yug.com/upload/iblock/748/7485689555ea52a11ce5b0c9fb5d324d.png" alt="">
          </div>
          <div class="col-8">
            <div class="id">ID F94504</div>
            <div class="tag">Свободно</div>
            <input class="form-check-input" type="checkbox" value="">
            <label>Объект ЖК "Великолепный"</label>
            <div class="parameters">
              Общая площадь <b>49,5 м²</b>
              <ul>
                <li>Жилая площадь 47 м²</li>
                <li>Корпус 1</li>
                <li>Подъезд 1</li>
                <li>Этаж 3</li>
                <li>№ кв. 32</li>
                <li>Комн. 1</li>
              </ul>
            </div>
            <div class="price">2 531 750  ₽ </div>
          </div>
          <div class="col-12 pt-4">
            <div class="buttons">
              <div class="button bron">Забронировать</div>
              <div class="button like"><i><svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M10 16.875C10 16.875 2.1875 12.5 2.1875 7.18751C2.18766 6.24855 2.51301 5.33863 3.10824 4.61244C3.70347 3.88626 4.53183 3.38863 5.45249 3.20418C6.37315 3.01972 7.32928 3.15982 8.15832 3.60066C8.98736 4.04149 9.63814 4.75585 10 5.62227L9.99999 5.62228C10.3619 4.75585 11.0126 4.04149 11.8417 3.60066C12.6707 3.15983 13.6268 3.01973 14.5475 3.20418C15.4682 3.38863 16.2965 3.88625 16.8918 4.61244C17.487 5.33863 17.8123 6.24855 17.8125 7.18751C17.8125 12.5 10 16.875 10 16.875Z" stroke="#666565" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
              </svg></i>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="object card col-4 mt-4">
        <div class="row">
          <div class="col-4 d-flex">
            <img src="https://ask-yug.com/upload/iblock/748/7485689555ea52a11ce5b0c9fb5d324d.png" alt="">
          </div>
          <div class="col-8">
            <div class="id">ID F94504</div>
            <div class="tag">Свободно</div>
            <input class="form-check-input" type="checkbox" value="">
            <label>Объект ЖК "Великолепный"</label>
            <div class="parameters">
              Общая площадь <b>49,5 м²</b>
              <ul>
                <li>Жилая площадь 47 м²</li>
                <li>Корпус 1</li>
                <li>Подъезд 1</li>
                <li>Этаж 3</li>
                <li>№ кв. 32</li>
                <li>Комн. 1</li>
              </ul>
            </div>
            <div class="price">2 531 750  ₽ </div>
          </div>
          <div class="col-12 pt-4">
            <div class="buttons">
              <div class="button bron">Забронировать</div>
              <div class="button like"><i><svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M10 16.875C10 16.875 2.1875 12.5 2.1875 7.18751C2.18766 6.24855 2.51301 5.33863 3.10824 4.61244C3.70347 3.88626 4.53183 3.38863 5.45249 3.20418C6.37315 3.01972 7.32928 3.15982 8.15832 3.60066C8.98736 4.04149 9.63814 4.75585 10 5.62227L9.99999 5.62228C10.3619 4.75585 11.0126 4.04149 11.8417 3.60066C12.6707 3.15983 13.6268 3.01973 14.5475 3.20418C15.4682 3.38863 16.2965 3.88625 16.8918 4.61244C17.487 5.33863 17.8123 6.24855 17.8125 7.18751C17.8125 12.5 10 16.875 10 16.875Z" stroke="#666565" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
              </svg></i>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="object card col-4 mt-4">
        <div class="row">
          <div class="col-4 d-flex">
            <img src="https://ask-yug.com/upload/iblock/748/7485689555ea52a11ce5b0c9fb5d324d.png" alt="">
          </div>
          <div class="col-8">
            <div class="id">ID F94504</div>
            <div class="tag">Свободно</div>
            <input class="form-check-input" type="checkbox" value="">
            <label>Объект ЖК "Великолепный"</label>
            <div class="parameters">
              Общая площадь <b>49,5 м²</b>
              <ul>
                <li>Жилая площадь 47 м²</li>
                <li>Корпус 1</li>
                <li>Подъезд 1</li>
                <li>Этаж 3</li>
                <li>№ кв. 32</li>
                <li>Комн. 1</li>
              </ul>
            </div>
            <div class="price">2 531 750  ₽ </div>
          </div>
          <div class="col-12 pt-4">
            <div class="buttons">
              <div class="button bron">Забронировать</div>
              <div class="button like"><i><svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M10 16.875C10 16.875 2.1875 12.5 2.1875 7.18751C2.18766 6.24855 2.51301 5.33863 3.10824 4.61244C3.70347 3.88626 4.53183 3.38863 5.45249 3.20418C6.37315 3.01972 7.32928 3.15982 8.15832 3.60066C8.98736 4.04149 9.63814 4.75585 10 5.62227L9.99999 5.62228C10.3619 4.75585 11.0126 4.04149 11.8417 3.60066C12.6707 3.15983 13.6268 3.01973 14.5475 3.20418C15.4682 3.38863 16.2965 3.88625 16.8918 4.61244C17.487 5.33863 17.8123 6.24855 17.8125 7.18751C17.8125 12.5 10 16.875 10 16.875Z" stroke="#666565" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
              </svg></i>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="object card col-4 mt-4">
        <div class="row">
          <div class="col-4 d-flex">
            <img src="https://ask-yug.com/upload/iblock/748/7485689555ea52a11ce5b0c9fb5d324d.png" alt="">
          </div>
          <div class="col-8">
            <div class="id">ID F94504</div>
            <div class="tag">Свободно</div>
            <input class="form-check-input" type="checkbox" value="">
            <label>Объект ЖК "Великолепный"</label>
            <div class="parameters">
              Общая площадь <b>49,5 м²</b>
              <ul>
                <li>Жилая площадь 47 м²</li>
                <li>Корпус 1</li>
                <li>Подъезд 1</li>
                <li>Этаж 3</li>
                <li>№ кв. 32</li>
                <li>Комн. 1</li>
              </ul>
            </div>
            <div class="price">2 531 750  ₽ </div>
          </div>
          <div class="col-12 pt-4">
            <div class="buttons">
              <div class="button bron">Забронировать</div>
              <div class="button like"><i><svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M10 16.875C10 16.875 2.1875 12.5 2.1875 7.18751C2.18766 6.24855 2.51301 5.33863 3.10824 4.61244C3.70347 3.88626 4.53183 3.38863 5.45249 3.20418C6.37315 3.01972 7.32928 3.15982 8.15832 3.60066C8.98736 4.04149 9.63814 4.75585 10 5.62227L9.99999 5.62228C10.3619 4.75585 11.0126 4.04149 11.8417 3.60066C12.6707 3.15983 13.6268 3.01973 14.5475 3.20418C15.4682 3.38863 16.2965 3.88625 16.8918 4.61244C17.487 5.33863 17.8123 6.24855 17.8125 7.18751C17.8125 12.5 10 16.875 10 16.875Z" stroke="#666565" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
              </svg></i>
              </div>
            </div>
          </div>
        </div>
      </div>
      </div>
    </div>
  </div>
</template>

<script>
// @ is an alias to /src

export default {
  name: 'HomeView',
}
</script>
<style lang="scss">
.dropdown button {
  display: inline-block;
  padding: 12px 24px;
  width: 100%;
  height: 44px;
  background: #F4F4F4;
  border-radius: 100px !important;
  color: #666565;
  border: none;
}
.input_box {
  display: flex;
  flex-direction: row;
  align-items: flex-start;
  padding: 0px;
  gap: 12px;

  height: 44px;

  input {
    display: flex;
    flex-direction: column;
    align-items: flex-start;
    padding: 12px 24px;
    gap: 10px;

    width: calc(50% - 10px);
    height: 44px;

    background: #F4F4F4;
    border-radius: 100px;

    flex: none;
    order: 0;
    flex-grow: 0;
    border: none;
  }
}
.text-input {
   display: flex;
   flex-direction: column;
   align-items: flex-start;
   padding: 12px 24px;
   gap: 10px;

   width: calc(100% - 10px);
   height: 44px;

   background: #F4F4F4;
   border-radius: 100px;

   flex: none;
   order: 0;
   flex-grow: 0;
   border: none;
 }
#objects {
  display: flex;
  flex-direction: column;
  align-items: flex-start;
  padding: 0px;
  gap: 20px;
  .header {
    height: 24px;

    font-style: normal;
    font-weight: 700;
    font-size: 20px;
    line-height: 24px;

    /* Черный */

    color: #1E1E1E;

  }
  .object {
    font-family: 'Calibri';
    padding: 14px;
    height: auto;
    margin-right: 20px;
    flex: 0 0 auto;
    width: calc(100%/3 - 20px);
    margin-bottom: 0;
    max-width: 360px;
    input[type="checkbox"] {
      position: absolute;
      right: 12px;
      top: 12px;
      width: 17px;
      height: 17px;
    }
    img {
      max-width: 144px;
      margin-left: -14px;
      margin-top: -14px;
    }
    .tag {
      background: #C9D6F0;
      border-radius: 100px;
      width: auto;
      display: inline-block;
      padding: 2px 8px;
      margin-left: 20px;
    }
    .id {
      font-style: normal;
      font-weight: 400;
      font-size: 12px;
      line-height: 15px;
      display: inline-block;
      color: #1E1E1E;
    }
    label {

      font-style: normal;
      font-weight: 700;
      font-size: 14px;
      line-height: 17px;
      color: #1E1E1E;
    }
    .price {
      font-style: normal;
      font-weight: 700;
      font-size: 16px;
      line-height: 20px;
      color: #333333;
      padding-top: 8px;
    }
    ul {
      font-style: normal;
      font-weight: 400;
      font-size: 12px;
      line-height: 15px;
      color: #666565;
      padding-left: 0;
      margin-bottom: 0;
      li {
        display: inline-block;
        &::before,
        &::after {
          display: inline-block;
          content: "";
          width: 3px;
          height: 3px;
          background: #284F9A;
          border-radius: 50%;
          margin: 0 7px;
          margin-bottom: 2px;
        }
      }
    }
    .buttons  {
      display: flex;
      gap: 10px;
      .button {
        &.bron {

          padding: 12px 24px;
          width: 276px;
          height: 44px;

          background: #284F9A;
          border-radius: 100px;


          font-family: 'Calibri';
          font-style: normal;
          font-weight: 700;
          font-size: 16px;
          line-height: 20px;
          /* identical to box height */

          text-align: center;

          /* Белый */

          color: #FFFEFE;
        }
        &.like {
          background: #F4F4F4;
          width: 44px;
          height: 44px;
        }
      }
    }
  }
}
</style>