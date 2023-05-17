import { toast, ToastOptions } from 'react-toastify';

const toastOptionDefault: ToastOptions = {
    position: 'top-right',
    autoClose: 3000,
    closeOnClick: true,
    pauseOnHover: false,
    draggable: true,
    theme: 'colored',
};

export const toastInfo = (
    message: string,
    toastOption: ToastOptions = toastOptionDefault
): void => {
    toast.info(message, toastOption);
};

export const toastSuccess = (
    message: string,
    toastOption: ToastOptions = toastOptionDefault
): void => {
    toast.success(message, toastOption);
};

export const toastWarning = (
    message: string,
    toastOption: ToastOptions = toastOptionDefault
): void => {
    toast.warning(message, toastOption);
};

export const toastError = (
    message: string,
    toastOption: ToastOptions = toastOptionDefault
): void => {
    toast.error(message, toastOption);
};