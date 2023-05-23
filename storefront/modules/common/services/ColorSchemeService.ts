import { ColorSchemeModel, ColorSchemes } from "../models/ColorScheme";

const lightTheme: ColorSchemeModel = {
  primary: '#a6171a',
  primaryLight: '#db3b3f',
  secondary: '#757575',
  success: '#28a745',
  warning: '#ffc107',
  error: '#dc3545',
  green: '#28a745',
  red: '#dc3545',
  orange: '#fd7e14',
  yellow: '#ffc107',
  cyan: '#17a2b8',
  foreground: '#000000',
  background: '#ffffff',
  black: '#000000',
  white: '#ffffff'
}

const darkTheme: ColorSchemeModel = {
  primary: '#b5e1f7',
  primaryLight: '#34c8e0',
  secondary: '#757575',
  success: '#28a745',
  warning: '#ffc107',
  error: '#dc3545',
  green: '#28a745',
  red: '#dc3545',
  orange: '#fd7e14',
  yellow: '#ffc107',
  cyan: '#17a2b8',
  background: '#000000',
  foreground: '#ffffff',
  black: '#000000',
  white: '#ffffff'
}

const themes: ColorSchemes = {
  light: lightTheme,
  dark: darkTheme
}

export const getColorCode = (color?: string | null, theme: string = 'light'): string => {
  let colorName = color ? color : 'black';
  return themes[theme][colorName];
}

export const getVariant = (theme: string = 'light') => {
  return theme === "light" ? "dark" : "light";
}