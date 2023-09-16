import React from 'react'
import {Input} from 'antd';
import './InputSearch.css'
const { Search } = Input;

const InputSearch = () => {
    const onSearch = (value) => console.log(value);
  return (
    <div className="search-container">
    <Search
      placeholder="input search text"
      className="search-bar"
      allowClear
      enterButton="Search"
      size="large"
      onSearch={onSearch}
    />
    </div>
  )
}

export default InputSearch
