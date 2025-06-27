// resources/js/Components/ThemeToggle.tsx

//usado para apresentar botar de tema claro e escuro
import { useEffect, useState } from 'react'

export default function ThemeToggle() {
  const [isDark, setIsDark] = useState(() => {
    if (typeof window !== 'undefined') {
      return localStorage.theme === 'dark' || (!localStorage.theme && window.matchMedia('(prefers-color-scheme: dark)').matches)
    }
    return false
  })

  useEffect(() => {
    if (isDark) {
      document.documentElement.classList.add('dark')
      localStorage.setItem('theme', 'dark')
    } else {
      document.documentElement.classList.remove('dark')
      localStorage.setItem('theme', 'light')
    }
  }, [isDark])

  return (
    <button onClick={() => setIsDark(!isDark)}>
      {isDark ? '☀️ Modo Claro' : '🌙 Modo Escuro'}
    </button>
  )
}
