import process from "process";
import { ParamModel } from "../models/Param";

const backendUrl = process.env.NEXT_PUBLIC_BACKEND_URL + '/api/';

function getUrlParams(params: ParamModel[]) {
    return params.length > 0 ? '?' + params.map(param => {
        return param.key + '=' + param.value;
    }).join('&') : '';
}

export async function getData(resource: string, params: ParamModel[]) {
    let url = backendUrl + resource + getUrlParams(params);
    const response = await fetch(url);
    return response.json();
}