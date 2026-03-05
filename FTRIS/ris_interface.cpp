#include <QApplication>
#include <QMainWindow>
#include <QPushButton>
#include <QTextEdit>
#include <QLabel>
#include <QSpinBox>
#include <QDoubleSpinBox>
#include <QVBoxLayout>
#include <QHBoxLayout>
#include <QFileDialog>
#include <QMessageBox>
#include <QWidget>
#include <QPixmap>
#include <QFile>

class RISMainWindow : public QMainWindow
{
    Q_OBJECT

public:
    RISMainWindow(QWidget *parent = nullptr) : QMainWindow(parent)
    {
        setWindowTitle("Referring Image Segmentation (RIS)");
        setMinimumSize(1000, 600);

        // ========== 1. 多模态输入区 ==========
        QWidget *inputWidget = new QWidget;
        QVBoxLayout *inputLayout = new QVBoxLayout(inputWidget);
        inputLayout->setSpacing(10);
        inputLayout->setContentsMargins(10, 10, 10, 10);

        // 文本描述输入
        QTextEdit *textInputEdit = new QTextEdit;
        textInputEdit->setPlaceholderText("An older man with glasses sitting at the table with his hands crossed");
        QPushButton *textInputBtn = new QPushButton("文本文描述（语义引导）");
        textInputBtn->setObjectName("blue-btn");

        // 参考图像输入
        QLabel *referenceImageLabel = new QLabel;
        referenceImageLabel->setFrameStyle(QFrame::Box | QFrame::Sunken);
        referenceImageLabel->setAlignment(Qt::AlignCenter);
        referenceImageLabel->setMinimumSize(200, 150);
        QPushButton *uploadRefImageBtn = new QPushButton("上传参考图像");
        uploadRefImageBtn->setObjectName("blue-btn");
        connect(uploadRefImageBtn, &QPushButton::clicked, this, [=]() {
            QString filePath = QFileDialog::getOpenFileName(this, "选择参考图像", "", "Images (*.png *.jpg *.jpeg)");
            if (!filePath.isEmpty()) {
                displayImage(filePath, referenceImageLabel);
            }
        });

        inputLayout->addWidget(textInputBtn);
        inputLayout->addWidget(textInputEdit);
        inputLayout->addSpacing(20);
        inputLayout->addWidget(new QLabel("参考图像输入"));
        inputLayout->addWidget(referenceImageLabel);
        inputLayout->addWidget(uploadRefImageBtn);
        inputLayout->addStretch();

        // ========== 2. 操作管理区 ==========
        QWidget *controlWidget = new QWidget;
        QVBoxLayout *controlLayout = new QVBoxLayout(controlWidget);
        controlLayout->setSpacing(10);
        controlLayout->setContentsMargins(10, 10, 10, 10);

        QPushButton *startSegBtn = new QPushButton("开始分割");
        startSegBtn->setObjectName("green-btn");
        connect(startSegBtn, &QPushButton::clicked, this, [=]() {
            QMessageBox::information(this, "提示", "分割已开始，请等待...");
            // 这里可添加实际分割逻辑
        });

        QPushButton *editSegBtn = new QPushButton("编辑分割掩码");
        editSegBtn->setObjectName("orange-btn");

        QPushButton *exportBtn = new QPushButton("导出分割结果");
        exportBtn->setObjectName("blue-btn");
        connect(exportBtn, &QPushButton::clicked, this, [=]() {
            QString savePath = QFileDialog::getSaveFileName(this, "导出分割结果", "", "Images (*.png *.jpg)");
            if (!savePath.isEmpty()) {
                QMessageBox::information(this, "提示", "结果已导出至: " + savePath);
            }
        });

        QPushButton *clearBtn = new QPushButton("清空所有内容");
        clearBtn->setObjectName("red-btn");
        connect(clearBtn, &QPushButton::clicked, this, [=]() {
            textInputEdit->clear();
            referenceImageLabel->clear();
            originalImageLabel->clear();
            segResultLabel->clear();
            statusTextEdit->clear();
            statusTextEdit->append("所有内容已清空");
        });

        // 参数设置
        QSpinBox *iterationsSpin = new QSpinBox;
        iterationsSpin->setRange(1, 100);
        iterationsSpin->setValue(5);
        QDoubleSpinBox *thresholdSpin = new QDoubleSpinBox;
        thresholdSpin->setRange(0.0, 1.0);
        thresholdSpin->setSingleStep(0.01);
        thresholdSpin->setValue(0.7);

        controlLayout->addWidget(startSegBtn);
        controlLayout->addWidget(editSegBtn);
        controlLayout->addWidget(exportBtn);
        controlLayout->addWidget(clearBtn);
        controlLayout->addSpacing(20);
        controlLayout->addWidget(new QLabel("处理参数"));
        controlLayout->addWidget(new QLabel("边缘平滑系数:"));
        controlLayout->addWidget(iterationsSpin);
        controlLayout->addWidget(new QLabel("置信度阈值:"));
        controlLayout->addWidget(thresholdSpin);
        controlLayout->addStretch();

        // ========== 3. 结果展示区 ==========
        QWidget *resultWidget = new QWidget;
        QVBoxLayout *resultLayout = new QVBoxLayout(resultWidget);
        resultLayout->setSpacing(10);
        resultLayout->setContentsMargins(10, 10, 10, 10);

        // 图像展示行
        QHBoxLayout *imageRowLayout = new QHBoxLayout;
        originalImageLabel = new QLabel;
        originalImageLabel->setFrameStyle(QFrame::Box | QFrame::Sunken);
        originalImageLabel->setAlignment(Qt::AlignCenter);
        originalImageLabel->setMinimumSize(250, 200);
        segResultLabel = new QLabel;
        segResultLabel->setFrameStyle(QFrame::Box | QFrame::Sunken);
        segResultLabel->setAlignment(Qt::AlignCenter);
        segResultLabel->setMinimumSize(250, 200);

        imageRowLayout->addWidget(new QLabel("原始图像"));
        imageRowLayout->addWidget(originalImageLabel);
        imageRowLayout->addWidget(new QLabel("分割结果"));
        imageRowLayout->addWidget(segResultLabel);
        imageRowLayout->setStretch(1, 1);
        imageRowLayout->setStretch(3, 1);

        // 状态信息
        statusTextEdit = new QTextEdit;
        statusTextEdit->setReadOnly(true);
        statusTextEdit->setMaximumHeight(100);
        statusTextEdit->append("分割状态: 未开始");
        statusTextEdit->append("保存状态: 未保存");

        resultLayout->addLayout(imageRowLayout);
        resultLayout->addWidget(new QLabel("操作日志/输入参数及处理过程"));
        resultLayout->addWidget(statusTextEdit);
        resultLayout->addStretch();

        // ========== 主布局 ==========
        QWidget *centralWidget = new QWidget;
        QHBoxLayout *mainLayout = new QHBoxLayout(centralWidget);
        mainLayout->addWidget(inputWidget, 1);
        mainLayout->addWidget(controlWidget, 1);
        mainLayout->addWidget(resultWidget, 2);
        setCentralWidget(centralWidget);

        // ========== 样式表 ==========
        QString styleSheet = R"(
            /* 蓝色按钮 */
            QPushButton#blue-btn {
                background-color: #2196F3;
                color: white;
                border: none;
                padding: 8px 16px;
                border-radius: 4px;
                font-weight: bold;
            }
            QPushButton#blue-btn:hover {
                background-color: #1976D2;
            }

            /* 绿色按钮 */
            QPushButton#green-btn {
                background-color: #4CAF50;
                color: white;
                border: none;
                padding: 8px 16px;
                border-radius: 4px;
                font-weight: bold;
            }
            QPushButton#green-btn:hover {
                background-color: #388E3C;
            }

            /* 橙色按钮 */
            QPushButton#orange-btn {
                background-color: #FF9800;
                color: white;
                border: none;
                padding: 8px 16px;
                border-radius: 4px;
                font-weight: bold;
            }
            QPushButton#orange-btn:hover {
                background-color: #F57C00;
            }

            /* 红色按钮 */
            QPushButton#red-btn {
                background-color: #F44336;
                color: white;
                border: none;
                padding: 8px 16px;
                border-radius: 4px;
                font-weight: bold;
            }
            QPushButton#red-btn:hover {
                background-color: #D32F2F;
            }

            /* 通用样式 */
            QLabel { font-size: 12px; }
            QPushButton { font-size: 12px; }
            QTextEdit { font-size: 12px; }
            QSpinBox, QDoubleSpinBox { font-size: 12px; padding: 4px; }
        )";
        this->setStyleSheet(styleSheet);
    }

private slots:
    void displayImage(const QString &path, QLabel *label) {
        QPixmap pixmap(path);
        if (!pixmap.isNull()) {
            label->setPixmap(pixmap.scaled(label->size(), Qt::KeepAspectRatio, Qt::SmoothTransformation));
        }
    }

private:
    QLabel *originalImageLabel;
    QLabel *segResultLabel;
    QTextEdit *statusTextEdit;
};

int main(int argc, char *argv[])
{
    QApplication a(argc, argv);
    RISMainWindow w;
    w.show();
    return a.exec();
}

#include "ris_interface.moc" // 单文件需手动包含moc生成文件