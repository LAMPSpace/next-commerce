import { ColorSchemeModel, ColorSchemes } from "../models/ColorScheme";

const lightTheme: ColorSchemeModel = {
  primary: '#273473',
  primaryLight: '#365280',
  secondary: '#757575',
  success: '#28a745',
  warning: '#ffc107',
  error: '#dc3545',
  green: '#28a745',
  red: '#dc3545',
  orange: '#fd7e14',
  yellow: '#ffc107',
  cyan: '#17a2b8',
  black: '#000000'
}

const darkTheme: ColorSchemeModel = {
  primary: '#b5e1f7',
  primaryLight: '#b5e1f7',
  secondary: '#757575',
  success: '#28a745',
  warning: '#ffc107',
  error: '#dc3545',
  green: '#28a745',
  red: '#dc3545',
  orange: '#fd7e14',
  yellow: '#ffc107',
  cyan: '#17a2b8',
  black: '#000000'
}

const themes: ColorSchemes = {
  light: lightTheme,
  dark: darkTheme
}

// const theme: ThemeModel = window.matchMedia('(prefers-color-scheme: dark)').matches ? darkTheme : lightTheme;

// export const getColorCode = (color: string, mode: string): string => {
//   return themes[mode][color];
// }

export const getColorCode = (color?: string | null): string => {
  let colorName = color ? color : 'black';
  return themes['light'][colorName];
}