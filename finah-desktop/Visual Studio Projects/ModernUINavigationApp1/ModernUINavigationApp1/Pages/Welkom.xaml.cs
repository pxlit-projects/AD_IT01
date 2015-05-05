using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows;
using System.Windows.Controls;
using System.Windows.Data;
using System.Windows.Documents;
using System.Windows.Input;
using System.Windows.Media;
using System.Windows.Media.Imaging;
using System.Windows.Navigation;
using System.Windows.Shapes;

namespace ModernUINavigationApp1.Pages
{
    /// <summary>
    /// Interaction logic for Welkom.xaml
    /// </summary>
    public partial class Welkom : UserControl
    {
        public Welkom()
        {
            InitializeComponent();
            if (MainWindow.login == false)
            {
                MainWindow.LoginWindow();
            }
        }
    }
}
