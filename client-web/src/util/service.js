import dayjs from "dayjs"

export const Config = {
    pagination : 5,
    imagePath : "http://127.0.0.1:8000/storage/posts/"
}

export const isEmptyOrNull = (value) => {
    if(value === "" || value == null || value === 'null' || value === undefined){
        return true;
    }
    return false;
}

export const formatDateForClient = (date) => {
    if(!isEmptyOrNull(date)){
        return dayjs(date).format("ថ្ងៃDD/ ខែMM/ ឆ្នាំYYYY")
    }
    return null
}